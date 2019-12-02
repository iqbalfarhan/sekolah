<?php

namespace App\Http\Controllers;

use App\Ppdb;
use App\User;
use App\Ppdb_berkas;
use App\Ppdb_setting;
use App\Student;
use App\Sekolah;
use App\Detail_siswa;
use App\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PpdbadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $get = $request->get('urutkan');
        if ($get == "jurusan") {
            $data = Ppdb::orderBy('jurusan_id', 'asc')->get(['id', 'user_id', 'kode_reg', 'nama_lengkap', 'tanggal_daftar', 'jurusan_id', 'status']);
        }
        elseif ($get == "status") {
            $data = Ppdb::orderBy('status', 'asc')->get(['id', 'user_id', 'kode_reg', 'nama_lengkap', 'tanggal_daftar', 'jurusan_id', 'status']);
        }
        elseif ($get == "tanggal") {
            $data = Ppdb::orderBy('tanggal_daftar', 'asc')->get(['id', 'user_id', 'kode_reg', 'nama_lengkap', 'tanggal_daftar', 'jurusan_id', 'status']);
        }
        else{
            $data = Ppdb::all(['id', 'user_id', 'kode_reg', 'nama_lengkap', 'tanggal_daftar', 'jurusan_id', 'status']);
        }

        $sesi = Ppdb_setting::first();
        
        return view('ppdbadmin.list',['data' => $data, 'get' => $get, 'sesi' => $sesi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ppdb_setting::first();
        return view('ppdbadmin.pengaturan', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*ppdb settings*/
        $mulai = $request->post('mulai');
        $selesai = $request->post('selesai');
        $keterangan = $request->post('keterangan') ?? "";
        $linkppdb = $request->post('linkppdb') ?? "";

        $dataupdate = [
            'mulai' => $mulai,
            'selesai' => $selesai,
            'keterangan' => $keterangan,
            'linkppdb' => $linkppdb,
        ];

        if (Ppdb_setting::all()->count() != 0) {
            Ppdb_setting::truncate();
        }

        Ppdb_setting::insert($dataupdate);

        return back()->with('success', 'Pengaturan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ppdb_id)
    {
        $data = Ppdb::where('id', $ppdb_id)->first(['id', 'kode_reg', 'nama_lengkap', 'jk', 'jurusan_id', 'photo']);
        $data_pribadi = Ppdb::where('id', $ppdb_id)->first()->data_pribadi ?? "";
        $orangtua = Ppdb::where('id', $ppdb_id)->first()->orangtua_wali ?? "";
        $rincian = Ppdb::where('id', $ppdb_id)->first()->rincian ?? "";
        $registrasi = Ppdb::where('id', $ppdb_id)->first()->registrasi ?? "";
        $berkas = Ppdb_berkas::where('ppdb_id', $ppdb_id)->get();

        //print_r($registrasi);

        return view('ppdbadmin.detail', [
            'data' => $data,
            'pribadi' => json_decode($data_pribadi),
            'orangtua' => json_decode($orangtua),
            'rincian' => json_decode($rincian),
            'berkass' => $berkas,
            'registrasi' => json_decode($registrasi)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ppdb::where('id', $id)->first();
        return view('ppdbadmin.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ppdb = Ppdb::where('id', $id)->update([
            'status' => $request->post('status')
        ]);

        if ($ppdb) {
            return redirect(route('ppdbadmin.index'))->with('success', 'Pengaturan berhasil disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function migrasi()
    {
        $data = Ppdb::where('status', 'diterima')->get();
        return view('ppdbadmin.migrasi', ['data' => $data]);
    }

    public function migrasi_store($data)
    {
        if ($data == "all") {
            $diterima = Ppdb::where('status', 'diterima')->get();

            foreach ($diterima as $row) {
                $ppdb = Ppdb::where('id', $row->id)->first();
                $ppdb_berkas = Ppdb_berkas::where('ppdb_id', $row->id)->get();

                $siswa = Student::create([
                    'nis' => uniqid(),
                    'name' => $ppdb->nama_lengkap,
                    'jk' => $ppdb->jk,
                    'kelas_id' => 0,
                    'status' => 'aktif',
                    'photo' => $ppdb->photo ?? "default.png",
                ]);

                Detail_siswa::insert([
                    'siswa_id' => $siswa->id,
                    'data_pribadi' => $ppdb->data_pribadi,
                    'orangtua_wali' => $ppdb->orangtua_wali,
                    'rincian' => $ppdb->rincian,
                    'registrasi' => $ppdb->registrasi,
                ]);

                foreach ($ppdb_berkas as $key) {
                    Berkas::insert([
                        'siswa_id' => $siswa->id,
                        'nama_berkas' => $key->nama_berkas,
                        'file_name' => $key->file_name,
                    ]);
                }

                Ppdb::where('id', $row->id)->delete();
                Ppdb_berkas::where('ppdb_id', $row->id)->delete();
            }

            return redirect(route('ppdbadmin.migrasi'))->with('success', 'Data ppdb berhasil di migrasi ke siswa');
        }
        else{
            $ppdb = Ppdb::where('id', $data)->first();
            $ppdb_berkas = Ppdb_berkas::where('ppdb_id', $data)->get();

            $siswa = Student::create([
                'nis' => uniqid(),
                'name' => $ppdb->nama_lengkap,
                'jk' => $ppdb->jk,
                'kelas_id' => 0,
                'status' => 'aktif',
                'tahun_masuk' => date('Y', strtotime($ppdb->tanggal_daftar)),
                'jurusan_id' => json_decode($ppdb->registrasi, TRUE)['kompetensi_keahlian'] ?? 0,
                'photo' => $ppdb->photo ?? "default.png",
            ]);

            Detail_siswa::insert([
                'siswa_id' => $siswa->id,
                'data_pribadi' => $ppdb->data_pribadi,
                'orangtua_wali' => $ppdb->orangtua_wali,
                'rincian' => $ppdb->rincian,
                'registrasi' => $ppdb->registrasi,
            ]);

            foreach ($ppdb_berkas as $key) {
                Berkas::insert([
                    'siswa_id' => $siswa->id,
                    'nama_berkas' => $key->nama_berkas,
                    'file_name' => $key->file_name,
                ]);
            }

            /*Ppdb::where('id', $data)->delete();
            Ppdb_berkas::where('ppdb_id', $data)->delete();*/

            return redirect(route('ppdbadmin.migrasi'))->with('success', 'Data ppdb berhasil di migrasi ke siswa');
        }
    }

    public function akun_list()
    {
        $data = User::where('role', 'user')->orderBy('id', 'desc')->get();
        return view('ppdbadmin.akun', ['datas' => $data]);
    }

    protected function akun_create()
    {
        return view('ppdbadmin.create');
    }

    public function akun_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        return redirect(route('ppdbadmin.akun_list'))->with('success', 'Akun pendaftar berhasil di buat');
    }

    public function print_akun(User $user)
    {
        $sekolah = Sekolah::first() ?? "";
        return view('ppdbadmin.print', ['data'=> $user, 'sekolah' => $sekolah]);
    }

    public function reset_password(User $user)
    {
        $password = Hash::make('abcd1234');
        User::where('id', $user->id)->update([
            'password' => $password
        ]);
        return redirect(route('ppdbadmin.akun_list'))->with('success', 'Reset password '.$user->email.' berhasil');
    }

    public function resetppdb()
    {
        Ppdb_setting::truncate();
        return back()->with('success', 'Reset PPDB berhasil');
    }
}