<?php

namespace App\Http\Controllers;

use App\Daftarlain;
use App\Kelas;
use App\Detail_siswa;
use App\Student;
use App\Berkas;
use App\Jurusan;
use App\Exports\StudentsExport;
use App\imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelass = Kelas::orderBy('grade', 'asc')->get();
        $selected_kelas = Kelas::where('id', $request->query('kelas'))->first();

        $kelas_id = $request->get('kelas');

        if ($kelas_id) {
            $students = Student::where(['status'=> 'aktif', 'kelas_id' => $kelas_id])->get();
        }
        else{
            $students = Student::where('status', 'aktif')->get();
        }
        
        return view('student.list', [
            'students' => $students,
            'kelass' => $kelass,
            'selected_kelas' => $selected_kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelass = Kelas::orderBy('grade', 'asc')->get();
        $jurusans = Jurusan::all();
        return view('student.create', ['kelass' => $kelass, 'jurusans' => $jurusans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nis' => 'required|max:255',
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages())->withInput();
        }

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $upload = $photo->store('public/img');
        }

        $query = Student::insert([
            'nis' => $request->post('nis'),
            'name' => $request->post('name'),
            'jk' => $request->post('jk'),
            'tahun_masuk' => $request->post('tahun_masuk'),
            'jurusan_id' => $request->post('jurusan_id') ?? "0",
            'kelas_id' => $request->post('kelas_id') ?? "0",
            'status' => $request->post('status'),
            'photo' => $upload ?? "default.png"
        ]);

        if ($query) {
            return redirect()->route('student.index')->with('success' ,'Siswa Berhasil di tambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data_pribadi = Detail_siswa::where('siswa_id', $student->id)->first()->data_pribadi ?? "";
        $orangtua = Detail_siswa::where('siswa_id', $student->id)->first()->orangtua_wali ?? "";
        $rincian = Detail_siswa::where('siswa_id', $student->id)->first()->rincian ?? "";
        $registrasi = Detail_siswa::where('siswa_id', $student->id)->first()->registrasi ?? "";
        $berkas = Berkas::where('siswa_id', $student->id)->get();

        return view('student.show', [
            'data' => $student,
            'pribadi' => json_decode($data_pribadi),
            'orangtua' => json_decode($orangtua),
            'rincian' => json_decode($rincian),
            'berkass' => json_decode($berkas),
            'registrasi' => json_decode($registrasi)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Student $student)
    {
        $detail_siswa = Detail_siswa::where('siswa_id', $student->id)->first();
        $page = $request->get('page') ?? "";
        $kelass = Kelas::orderBy('grade', 'asc')->get();
        $jurusans = Jurusan::all();


        $kebutuhan_khusus = $this->kebutuhan_khusus();


        switch ($page) {
            case 'orangtua':
            $data = $detail_siswa->orangtua_wali ?? "";
            return view('student.orangtua', [
                'student' => $student,
                'data' => json_decode($data, TRUE),
                'kebutuhan_khusus' => $kebutuhan_khusus,
            ]);
            break;

            case 'rincian':
            $data = $detail_siswa->rincian ?? "";
            return view('student.rincian', [
                'student' => $student,
                'data' => json_decode($data, TRUE),
            ]);
            break;

            case 'registrasi':
            $jurusans = Jurusan::all();
            $data = $detail_siswa->registrasi ?? "";
            return view('student.registrasi', [
                'student' => $student,
                'jurusans' => $jurusans,
                'data' => json_decode($data, TRUE),
            ]);
            break;

            case 'berkas':
            $data = Berkas::where('siswa_id', $student->id)->get();
            return view('student.berkas', [
                'student' => $student,
                'data' => json_decode($data, TRUE),
            ]);
            break;

            case 'data_pribadi':
            $data = $detail_siswa->data_pribadi ?? "";
            return view('student.pribadi', [
                'student' => $student,
                'data' => json_decode($data, TRUE),
                'kebutuhan_khusus' => $kebutuhan_khusus,
            ]);
            break;
            
            default:
            return view('student.edit', [
                'student' => $student,
                'jurusans' => $jurusans,
                'kelass' => $kelass,
            ]);
            break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $query = Student::where('id', $student->id)->update([
            'nis' => $request->post('nis'),
            'name' => $request->post('name'),
            'jk' => $request->post('jk'),
            'kelas_id' => $request->post('kelas_id'),
            'status' => $request->post('status'),
            'tahun_masuk' => $request->post('tahun_masuk'),
            'jurusan_id' => $request->post('jurusan_id'),
        ]);

        if ($query) {
            return back()->with('success' ,'Data siswa berhasi di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $query = Student::where('id', $student->id)->delete();

        if ($query) {
            return back()->with('success' ,'Data siswa berhasil di hapus');
        }
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

    public function edit_datadiri(Request $request, Student $student)
    {

        $array = [
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

        //echo json_encode($request->post());
        //echo json_encode($array);

        $countdata = Detail_siswa::where('siswa_id', $request->post('id'))->count();

        if ($countdata != 0) {
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->update([
                'data_pribadi' => json_encode($array)
            ]);

            if ($edit == TRUE) {
                return back()->with('success', 'berhasil merubah data siswa');
            }
        }
        else{
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->firstOrCreate([
                'siswa_id' => $request->post('id'),
                'data_pribadi' => json_encode($array)
            ]);
            return back()->with('info', 'Sistem berhasil membuat detail siswa, record telah disimpan ke dalam sistem');
        }

    }

    public function edit_orangtua(Request $request, Student $student)
    {
        $d_ayah = $request->post('ayah');
        $d_ibu = $request->post('ibu');
        $d_wali = $request->post('wali');

        $array = [
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
        
        $countdata = Detail_siswa::where('siswa_id', $request->post('id'))->count();

        if ($countdata != 0) {
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->update([
                'orangtua_wali' => json_encode($array)
            ]);

            if ($edit == TRUE) {
                return back()->with('success', 'berhasil merubah data siswa');
            }
        }
        else{
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->firstOrCreate([
                'siswa_id' => $request->post('id'),
                'orangtua_wali' => json_encode($array)
            ]);
            return back()->with('info', 'Sistem berhasil membuat detail siswa, record telah disimpan ke dalam sistem');
        }
    }

    public function edit_rincian(Request $request, Student $student)
    {
        $array = [
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

        $countdata = Detail_siswa::where('siswa_id', $request->post('id'))->count();

        if ($countdata != 0) {
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->update([
                'rincian' => json_encode($array)
            ]);

            if ($edit == TRUE) {
                return back()->with('success', 'berhasil merubah data siswa');
            }
        }
        else{
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->firstOrCreate([
                'siswa_id' => $request->post('id'),
                'rincian' => json_encode($array)
            ]);
            return back()->with('info', 'Sistem berhasil membuat detail siswa, record telah disimpan ke dalam sistem');
        }
        
    }

    public function edit_registrasi(Request $request, Student $student)
    {
        $array = [
            'kompetensi_keahlian' => $request->post('kompetensi_keahlian'),
            'jenis_pendaftaran' => $request->post('jenis_pendaftaran'),
            'nis' => $request->post('nis'),
            'tanggal_masuk_sekolah' => $request->post('tanggal_masuk_sekolah'),
            'asal_sekolah' => $request->post('asal_sekolah'),
            'nomor_peserta_ujian' => $request->post('nomor_peserta_ujian'),
            'no_ijazah' => $request->post('no_ijazah'),
            'no_skhu' => $request->post('no_skhu'),
        ];
        $countdata = Detail_siswa::where('siswa_id', $request->post('id'))->count();

        if ($countdata != 0) {
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->update([
                'registrasi' => json_encode($array)
            ]);

            if ($edit == TRUE) {
                return back()->with('success', 'berhasil merubah data siswa');
            }
        }
        else{
            $edit = Detail_siswa::where('siswa_id', $request->post('id'))->firstOrCreate([
                'siswa_id' => $request->post('id'),
                'registrasi' => json_encode($array)
            ]);
            return back()->with('info', 'Sistem berhasil membuat detail siswa, record telah disimpan ke dalam sistem');
        }
    }

    public function photo_upload(Request $request, Student $student)
    {
        $request->validate([
            'photo' => 'Image|max:1024'
        ]);

        $photo = $request->file('photo');
        $upload = $photo->store('public/img');

        if ($upload) {
            Storage::delete(Student::where('id', $student->id)->first()->photo);
            Student::where('id', $student->id)->update([
                'photo' => $upload
            ]);
            return back()->with('info', 'Berhasil Upload Photo');
        }

    }

    public function berkas_upload(Request $request, $berkas)
    {
        $request->validate([
            'file' => 'required|Max:1024'
        ]);

        $siswa_id = $request->post('siswa_id');

        $_berkas_siswa = Berkas::where(['siswa_id' => $siswa_id, 'nama_berkas' => $berkas]);

        $file = $request->file('file')[$berkas];
        $upload = $file->store('public/berkas');

        if ($_berkas_siswa->count() == 0) {
            Berkas::insert([
                'siswa_id' => $siswa_id,
                'nama_berkas' => $berkas,
                'file_name' => $upload,
                'created_at' => now()
            ]);
        }
        else{
            $getfilename = $_berkas_siswa->first()->file_name;
            Storage::delete($getfilename);

            $_berkas_siswa->update([
                'file_name' => $upload,
            ]);
        }
        return back()->with('success', 'Berhasil mengupload berkas '.$berkas);
        
    }

    public function berkas_hapus(Request $request)
    {
        $siswa_id = $request->get('siswa_id');
        $berkas = $request->get('berkas');

        $_berkas_siswa = Berkas::where(['siswa_id' => $siswa_id, 'nama_berkas' => $berkas]);
        $getfilename = $_berkas_siswa->first()->file_name;
        $hapus = Storage::delete($getfilename);

        if ($hapus) {
            Berkas::where('file_name', $getfilename)->delete();
            return back()->with('success', 'Berhasil menghapus berkas '.$berkas);
        }
        else{
            return back()->with('warning', 'Tidak dapat menghapus berkas ini');
        }
    }

    public function deleted(Student $student)
    {
        $students = Student::onlyTrashed()->get();
        return view('student.deleted', [
            'students' => $students
        ]);
    }

    public function restore(Request $request, $student)
    {
        if ($request->get('restoreall') == "all") {
            $students = Student::onlyTrashed()->get();
            foreach ($students as $student) {
                Student::withTrashed()->where('id', $student->id)->restore();
            }
        }
        else{
            Student::withTrashed()->where('id', $student)->restore();
        }
        return back()->with('success', 'Siswa berhasil di restore');
    }

    public function forcedelete(Request $request, $student)
    {
        if ($request->get('forceall') == "all") {
            $students = Student::onlyTrashed()->get();
            foreach ($students as $student) {
                $berkas = Berkas::where('siswa_id', $student->id)->get();
                foreach ($berkas as $berka) {
                    Storage::delete($berka->filname);
                }
                Student::withTrashed()->where('id', $student->id)->forceDelete();
            }
        }
        else{
            $berkas = Berkas::where('siswa_id', $student)->get();
            foreach ($berkas as $berka) {
                Storage::delete($berka->filname);
            }
            Student::withTrashed()->where('id', $student)->forceDelete();
        }

        return back()->with('success', 'Siswa berhasil di haspus');
    }

    public function kelas_change()
    {
        $kelas = Kelas::all();
        $students = Student::where('status', 'aktif')->get();
        return view('student.pindahkelas', ['students' => $students, 'kelas' => $kelas]);
    }

    public function kelas_update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pilih' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'Pilih minimal 1 nama siswa untuk dipindah kelas');
        }

        foreach ($request->post('pilih') as $key) {
            Student::find($key)->update([
                'kelas_id' => $request->post('kelas_id')
            ]);
        }
        return back()->with('success', 'Berhasil merubah kelas siswa ');
    }

    public function import()
    {
        return view('student.import');
    }

    public function import_store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        Excel::import(new StudentsImport, $request->file('file'));

        return redirect(route('student.index'))->with('success', 'Berhasil import data siswa');
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'peserta_didik_'.time().'.xlsx');
    }
}