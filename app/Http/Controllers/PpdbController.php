<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use App\Jurusan;
use App\User;
use Auth;
use App\Ppdb;
use App\Ppdb_berkas;
use App\Ppdb_setting;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'register']);
    }

    public function index()
    {
        $info = Ppdb_setting::first();

        $now = date('Y-m-d');

        if (Ppdb_setting::count() == 0) {
            return view('ppdb.expired');
        }
        elseif($info->mulai > now()){
            return view('ppdb.expired', ['pesan' => 'PPDB Online akan dimulai pada '.date('d F Y', strtotime($info->mulai))]);
        }
        elseif($info->selesai < now()){
            return view('ppdb.expired', ['pesan' => 'PPDB Online telah selesai pada '.date('d F Y', strtotime($info->selesai))]);   
        }
        else{
            $auth = Auth::User();
            $data = Ppdb::where('user_id', $auth->id)->first();
            return view('ppdb.dashboard', ['auth' => $auth, 'info' => $info, 'data' => $data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::User();
        $data = Ppdb::where('user_id', $auth->id)->first(['user_id', 'kode_reg', 'nama_lengkap', 'jk', 'jurusan_id', 'status']);
        return view('ppdb.status', ['data' => $data, 'auth' => $auth]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::User()->id;

        $data = Ppdb::where('user_id', $user_id)->first(['user_id', 'kode_reg', 'nama_lengkap', 'jk', 'jurusan_id', 'photo','tanggal_daftar']);
        $data_pribadi = Ppdb::where('user_id', $user_id)->first()->data_pribadi ?? "";
        $orangtua = Ppdb::where('user_id', $user_id)->first()->orangtua_wali ?? "";
        $rincian = Ppdb::where('user_id', $user_id)->first()->rincian ?? "";
        $registrasi = Ppdb::where('user_id', $user_id)->first()->registrasi ?? "";

        //print_r($registrasi);

        return view('ppdb.detail', [
            'data' => $data,
            'pribadi' => json_decode($data_pribadi),
            'orangtua' => json_decode($orangtua),
            'rincian' => json_decode($rincian),
            'registrasi' => json_decode($registrasi)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function edit($page)
    {
        $auth = Auth::User();
        $status = Ppdb::where('user_id', $auth->id)->first()->status ?? "persiapan";

        if ($status != "persiapan") {
            return redirect(route('ppdb.show', 'lihatdata'))->with('message', ['type' => 'warning', 'text' => 'anda sudah melakuan pendaftaran. tidak dapat lagi merubah data anda']);
        }
        elseif (Ppdb_setting::count() == 0) {
            return redirect(route('ppdb.index'));
        }
        else{
            $kebutuhan_khusus = $this->kebutuhan_khusus();
            $jurusans = Jurusan::all();
            $data = "";

            if ($page == 'pribadi') {
                $data = Ppdb::where('user_id', $auth->id)->first()->data_pribadi ?? "";
            }
            elseif ($page == 'orangtua') {
                $data = Ppdb::where('user_id', $auth->id)->first()->orangtua_wali ?? "";
            }
            elseif ($page == 'rincian') {
                $data = Ppdb::where('user_id', $auth->id)->first()->rincian ?? "";
            }
            elseif ($page == 'pendaftaran') {
                $data = Ppdb::where('user_id', $auth->id)->first()->registrasi ?? "";
            }
            elseif ($page == 'berkas') {
                $ppdb = Ppdb::where('user_id', $auth->id ?? 0)->first();
                $data = Ppdb_berkas::where('ppdb_id', $ppdb->id ?? 0)->get() ?? "";
            }
            elseif ($page == 'final') {
                $data = Ppdb::where('user_id', $auth->id)->first();
            }

            return view('ppdb.edit', [
                'page' => $page,
                'kebutuhan_khusus' => $kebutuhan_khusus,
                'jurusans' => $jurusans,
                'auth' => $auth,
                'data' => json_decode($data, TRUE) ?? array()
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {


        switch ($page) {
            case 'pribadi':
            $data = [
                'nama_lengkap' => $request->post('nama_lengkap'),
                'nisn' => $request->post('nisn'),
                'nik' => $request->post('nik'),
                'tempat_lahir' => $request->post('tempat_lahir'),
                'tanggal_lahir' => $request->post('tanggal_lahir'),
                'nomor_akta' => $request->post('nomor_akta'),
                'agama' => $request->post('agama'),
                'jenis_kelamin' => $request->post('jenis_kelamin'),
                'kewarganegaraan' => $request->post('kewarganegaraan'),
                'kebutuhan_khusus' => $request->input('kebutuhan_khusus') ?? null,
                'alamat' => [
                    'jalan' => $request->post('alamat')['jalan'],
                    'rt' => $request->post('alamat')['rt'],
                    'rw' => $request->post('alamat')['rw'],
                    'dusun' => $request->post('alamat')['dusun'],
                    'kelurahan' => $request->post('alamat')['kelurahan'],
                    'kecamatan' => $request->post('alamat')['kecamatan'],
                    'kodepos' => $request->post('alamat')['kodepos'],
                    'lintang' => $request->post('alamat')['lintang'],
                    'bujur' => $request->post('alamat')['bujur'],
                ],
                'tempat_tinggal' => $request->post('tempat_tinggal'),
                'moda_transportasi' => $request->post('moda_transportasi'),
                'nomor_kks' => $request->post('nomor_kks'),
                'penerima_kps' => $request->post('penerima_kps'),
                'anak_keberapa' => $request->post('anak_keberapa'),
                'no_kps' => $request->post('no_kps'),
                'penerima_kip' => $request->post('penerima_kip'),
                'usulan_kip_sekolah' => $request->post('usulan_kip_sekolah'),
                'nomor_kip' => $request->post('nomor_kip'),
                'nama_kip' => $request->post('nama_kip'),
                'terima_fisik_kip' => $request->post('terima_fisik_kip'),
                'alasan_layak_pip' => $request->post('alasan_layak_pip'),
                'bank' => $request->post('bank'),
                'no_rekening' => $request->post('no_rekening'),
                'nama_rekening' => $request->post('nama_rekening'),
            ];

            //print_r($data);

            $user_id = $request->post('id');

            $count = Ppdb::where('user_id', $user_id)->count();
            if ($count == 0) {
                Ppdb::insert([
                    'data_pribadi' => json_encode($data),
                    'user_id' => $user_id,
                    'kode_reg' => uniqid(),
                    'nama_lengkap' => $request->nama_lengkap,
                    'jk' => $data['jenis_kelamin'] ?? "l",
                    'created_at' => NOW()
                ]);
            }
            else{
                Ppdb::where(['user_id' => $user_id])->update([
                    'data_pribadi' => json_encode($data),
                    'nama_lengkap' => $request->nama_lengkap,
                    'jk' => $data['jenis_kelamin'],
                ]);
            }
            return back()->with('message', ['type' => 'success', 'text' => 'Berhasil merubah data peserta didik '.$data['nama_lengkap']]);

            break;

            case 'orangtua':

            $d_ayah = $request->post('ayah');
            $d_ibu = $request->post('ibu');
            $d_wali = $request->post('wali');

            $data = [
                'ayah' => [
                    'nama_lengkap' => $d_ayah['nama_lengkap'],
                    'nik' => $d_ayah['nik'],
                    'tahun_lahir' => $d_ayah['tahun_lahir'],
                    'pendidikan' => $d_ayah['pendidikan'],
                    'pekerjaan' => $d_ayah['pekerjaan'],
                    'penghasilan' => $d_ayah['penghasilan'],
                    'kebutuhan_khusus' => $d_ayah['kebutuhan_khusus'] ?? null,
                ],
                'ibu' => [
                    'nama_lengkap' => $d_ibu['nama_lengkap'],
                    'nik' => $d_ibu['nik'],
                    'tahun_lahir' => $d_ibu['tahun_lahir'],
                    'pendidikan' => $d_ibu['pendidikan'],
                    'pekerjaan' => $d_ibu['pekerjaan'],
                    'penghasilan' => $d_ibu['penghasilan'],
                    'kebutuhan_khusus' => $d_ibu['kebutuhan_khusus'] ?? null,
                ],
                'wali' => [
                    'nama_lengkap' => $d_wali['nama_lengkap'],
                    'nik' => $d_wali['nik'],
                    'tahun_lahir' => $d_wali['tahun_lahir'],
                    'pendidikan' => $d_wali['pendidikan'],
                    'pekerjaan' => $d_wali['pekerjaan'],
                    'penghasilan' => $d_wali['penghasilan'],
                ],
                'telepon' => $request->post('telepon'),
                'handphone' => $request->post('handphone'),
                'email' => $request->post('email'),
            ];

            $user_id = $request->post('id');

            $count = Ppdb::where('user_id', $user_id)->count();
            if ($count == 0) {
                return back()->with('message', ['type' => 'warning', 'text' => 'Anda harus mengisi data pribadi terlebih dulu']);
            }
            else{
                Ppdb::where(['user_id' => $user_id])->update([
                    'orangtua_wali' => json_encode($data),
                ]);
                return back()->with('message', ['type' => 'success', 'text' => 'Berhasil merubah data orangtua dan wali peserta didik ']);
            }
            break;

            case 'rincian':
            $data = [
                'tinggi_badan' => $request->post('tinggi_badan'),
                'berat_badan' => $request->post('berat_badan'),
                'jarak_sekolah' => $request->post('jarak_sekolah'),
                'jauh_sekolah' => $request->post('jauh_sekolah'),
                'waktu_tempuh' => [
                    'jam' => $request->post('waktu_tempuh')['jam'],
                    'menit' => $request->post('waktu_tempuh')['menit'],
                ],
                'jumlah_saudara' => $request->post('jumlah_saudara'),
                'prestasi' => $request->post('prestasi'),
                'beasiswa' => $request->post('beasiswa'),
                'konseling' => $request->post('konseling'),
                'kesehatan' => $request->post('kesehatan'),
            ];

            $user_id = $request->post('id');

            $count = Ppdb::where('user_id', $user_id)->count();
            if ($count == 0) {
                return back()->with('message', ['type' => 'warning', 'text' => 'Anda harus mengisi data pribadi terlebih dulu']);
            }
            else{
                Ppdb::where(['user_id' => $user_id])->update([
                    'rincian' => json_encode($data),
                ]);
                return back()->with('message', ['type' => 'success', 'text' => 'Berhasil merubah data rincian peserta didik ']);
            }
            break;

            case 'pendaftaran':
            $data = [
                'kompetensi_keahlian' => $request->post('kompetensi_keahlian'),
                'jenis_pendaftaran' => $request->post('jenis_pendaftaran'),
                'nis' => $request->post('nis'),
                'tanggal_masuk_sekolah' => $request->post('tanggal_masuk_sekolah'),
                'asal_sekolah' => $request->post('asal_sekolah'),
                'nomor_peserta_ujian' => $request->post('nomor_peserta_ujian'),
                'no_ijazah' => $request->post('no_ijazah'),
                'no_skhu' => $request->post('no_skhu'),
            ];

            $user_id = $request->post('id');

            $count = Ppdb::where('user_id', $user_id)->count();
            if ($count == 0) {
                return back()->with('message', ['type' => 'warning', 'text' => 'Anda harus mengisi data pribadi terlebih dulu']);
            }
            else{
                Ppdb::where(['user_id' => $user_id])->update([
                    'registrasi' => json_encode($data),
                    'jurusan_id' => $request->post('kompetensi_keahlian') ?? 0
                ]);
                return back()->with('message', ['type' => 'success', 'text' => 'Berhasil merubah data registrasi peserta didik ']);
            }
            break;
            
            default:
            return back()->with('message', ['type' => 'danger', 'text' => 'Tidak ada perubahan data']);
            break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppdb $ppdb)
    {
        //
    }

    public function kebutuhan_khusus()
    {
        $data = array(
            'none' => "Tidak ada",
            'netra' => "Netra (A)",
            'rungu' => "Rungu (B)",
            'grahita_ringan' => "Grahita ringan (C1)",
            'grahita_sedang' => "Grahita sedang (C2)",
            'daksa_ringan' => "Daksa ringan (D1)",
            'daksa_sedang' => "Daksa sedang (D2)",
            'laras' => "Laras (E)",
            'wicara' => "Wicara (F)",
            'tuna_ganda' => "Tuna Ganda (G)",
            'hiper_aktif' => "Hiper Aktif (H)",
            'cerdas_istimewa' => "Cerdas Istimewa (I)",
            'bakat_istimewa' => "Bakat Istimewa (J)",
            'kesulitan_belajar' => "Kesulitan Belajar (K)",
            'narkoba' => "Narkoba (N)",
            'indigo' => "Indigo (O)",
            'down_syndrome' => "Down Syndrome (P)",
            'autis' => "Autis (Q)",
        );

        return $data;
    }

    public function photo_upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|Image'
        ]);

        $user_id = Auth::User()->id;

        $count = Ppdb::where('user_id', $user_id)->count();
        if ($count == 0) {
            return back()->with('message', ['type' => 'warning', 'text' => 'Anda harus mengisi data pribadi terlebih dulu']);
        }
        else{
            $photo = $request->file('photo');
            $upload = $photo->store('public/img');

            if ($upload) {
                $datauser = User::where('email', Auth::User()->email);
                Storage::delete($datauser->first()->photo);
                $datauser->update([
                    'photo' => $upload
                ]);
                Ppdb::where('user_id', Auth::User()->id)->update(['photo' => $upload]);
                return back()->with('message',['type' => 'info','text' => 'Berhasil Upload Photo']);
            }
        }



    }

    public function pengaturan()
    {
        $auth = Auth::User();
        return view('ppdb.pengaturan', ['auth' => $auth]);
    }

    public function update_account(Request $request)
    {
        $request->validate([
            'old_password' => 'required'
        ]);

        $name = $request->post('name');
        $old_password = $request->post('old_password');
        $password_baru = $request->post('password');

        if (Hash::check($old_password, Auth::User()->password) == true) {
            if ($password_baru != "") {
                $new_password = Hash::make($password_baru);
            }
            else{
                $new_password = Auth::User()->password;
            }
            User::where('id', Auth::User()->id)->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => $new_password,
            ]);
            return back()->with('message', ['type'=>'success', 'text' => 'perubahan data login berhasil']);
        }
        else{
            return back()->with('message', ['type'=>'danger', 'text' => 'password lama salah']);
        }
    }

    public function berkas_upload(Request $request, $berkas)
    {
        $request->validate([
            'file' => 'required|Max:1024'
        ]);

        $ppdb = Ppdb::where('user_id', Auth::User()->id);

        if ($ppdb->count() == 0) {
            return back()->with('message', ['type' => 'warning', 'text' => 'Anda harus mengisi data pribadi terlebih dulu']);
        }
        else{
            $datappdb = Ppdb_berkas::where(['ppdb_id' => $ppdb->first()->id, 'nama_berkas' => $berkas]);

            $file = $request->file('file')[$berkas];
            $upload = $file->store('public/berkas');

            if ($datappdb->count() == 0) {
                Ppdb_berkas::insert([
                    'ppdb_id' => $ppdb->first()->id,
                    'nama_berkas' => $berkas,
                    'file_name' => $upload,
                    'created_at' => now()
                ]);
            }
            else{
                $getfilename = $datappdb->first()->file_name;
                Storage::delete($getfilename);

                Ppdb_berkas::where([
                    'ppdb_id' => $ppdb->first()->id,
                    'nama_berkas' => $berkas,
                ])->update([
                    'file_name' => $upload,
                ]);
            }
            return back()->with('message', ['type' => 'success', 'text' => 'Berhasil mengupload berkas '.$berkas]);
            
        }
    }

    public function mendaftar(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $auth = Auth::User();
        $password = $request->post('password');

        if (Hash::check($password, $auth->password)) {

            Ppdb::where('user_id', $auth->id)->update([
                'status' => 'mendaftar',
                'tanggal_daftar' => now()
            ]);

            return back()->with('message', ['type' => 'success', 'text' => 'berhasil mendaftar. anda tidak bisa merubah data anda lagi']);
        }
        else{
            return back()->with('message', ['type' => 'danger', 'text' => 'Password yang anda masukkan salah']);
        }

    }

    public function pengumuman(Pengumuman $pengumuman)
    {
        $datas = Pengumuman::where('jenis', 'Pengumuman PPDB')->orderBy('created_at', 'desc')->get();
        return view('ppdb.pengumuman', ['datas' => $datas]);
    }

}