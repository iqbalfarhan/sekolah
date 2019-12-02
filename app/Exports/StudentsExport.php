<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [];

        $student = Student::all();

        foreach ($student as $siswa) {
            $data_pribadi = json_decode($siswa->detail_siswa->data_pribadi ?? null, TRUE);
            $orangtua_wali = json_decode($siswa->detail_siswa->orangtua_wali ?? null, TRUE);
            $rincian = json_decode($siswa->detail_siswa->rincian ?? null, TRUE);
            $registrasi = json_decode($siswa->detail_siswa->registrasi ?? null, TRUE);

            $kelas = $siswa->kelas->grade ?? ""." ".$siswa->jurusan->inisial ?? ""." ".$siswa->kelas->kelompok ?? "";

            $data[] = [
                'id' => $siswa->id,
                'nis' => $siswa->nis,
                'tahun_masuk' => $siswa->tahun_masuk,
                'name' => $siswa->name,
                'jk' => $siswa->jk,
                'kelas_id' => $kelas,
                'jurusan_id' => $siswa->jurusan->inisial,
                'status' => $siswa->status,

                'tempat_lahir' => $data_pribadi['tempat_lahir'] ?? "",
                'tanggal_lahir' => $data_pribadi['tanggal_lahir'] ?? "",
                'nomor_akta' => $data_pribadi['nomor_akta'] ?? "",
                'agama' => $data_pribadi['agama'] ?? "",
                'jenis_kelamin' => $data_pribadi['jenis_kelamin'] ?? "",
                'kewarganegaraan' => $data_pribadi['kewarganegaraan'] ?? "",
                'jalan' => $data_pribadi['jalan'] ?? "",
                'rt' => $data_pribadi['rt'] ?? "",
                'rw' => $data_pribadi['rw'] ?? "",
                'dusun' => $data_pribadi['dusun'] ?? "",
                'kelurahan' => $data_pribadi['kelurahan'] ?? "",
                'kecamatan' => $data_pribadi['kecamatan'] ?? "",
                'kodepos' => $data_pribadi['kodepos'] ?? "",
                'lintang' => $data_pribadi['lintang'] ?? "",
                'bujur' => $data_pribadi['bujur'] ?? "",
                'tempat_tinggal' => $data_pribadi['tempat_tinggal'] ?? "",
                'moda_transportasi' => $data_pribadi['moda_transportasi'] ?? "",
                'nomor_kks' => $data_pribadi['nomor_kks'] ?? "",
                'penerima_kps' => $data_pribadi['penerima_kps'] ?? "",
                'anak_keberapa' => $data_pribadi['anak_keberapa'] ?? "",
                'no_kps' => $data_pribadi['no_kps'] ?? "",
                'penerima_kip' => $data_pribadi['penerima_kip'] ?? "",
                'usulan_kip_sekolah' => $data_pribadi['usulan_kip_sekolah'] ?? "",
                'nomor_kip' => $data_pribadi['nomor_kip'] ?? "",
                'nama_kip' => $data_pribadi['nama_kip'] ?? "",
                'terima_fisik_kip' => $data_pribadi['terima_fisik_kip'] ?? "",
                'alasan_layak_pip' => $data_pribadi['alasan_layak_pip'] ?? "",
                'bank' => $data_pribadi['bank'] ?? "",
                'no_rekening' => $data_pribadi['no_rekening'] ?? "",
                'nama_rekening' => $data_pribadi['nama_rekening'] ?? "",

                'ayah_nama_lengkap' => $orangtua_wali['ayah']['nama_lengkap'] ?? "",
                'ayah_nik' => $orangtua_wali['ayah']['nik'] ?? "",
                'ayah_tahun_lahir' => $orangtua_wali['ayah']['tahun_lahir'] ?? "",
                'ayah_pendidikan' => $orangtua_wali['ayah']['pendidikan'] ?? "",
                'ayah_pekerjaan' => $orangtua_wali['ayah']['pekerjaan'] ?? "",
                'ayah_penghasilan' => $orangtua_wali['ayah']['penghasilan'] ?? "",

                'ibu_nama_lengkap' => $orangtua_wali['ibu']['nama_lengkap'] ?? "",
                'ibu_nik' => $orangtua_wali['ibu']['nik'] ?? "",
                'ibu_tahun_lahir' => $orangtua_wali['ibu']['tahun_lahir'] ?? "",
                'ibu_pendidikan' => $orangtua_wali['ibu']['pendidikan'] ?? "",
                'ibu_pekerjaan' => $orangtua_wali['ibu']['pekerjaan'] ?? "",
                'ibu_penghasilan' => $orangtua_wali['ibu']['penghasilan'] ?? "",

                'wali_nama_lengkap' => $orangtua_wali['wali']['nama_lengkap'] ?? "",
                'wali_nik' => $orangtua_wali['wali']['nik'] ?? "",
                'wali_tahun_lahir' => $orangtua_wali['wali']['tahun_lahir'] ?? "",
                'wali_pendidikan' => $orangtua_wali['wali']['pendidikan'] ?? "",
                'wali_pekerjaan' => $orangtua_wali['wali']['pekerjaan'] ?? "",
                'wali_penghasilan' => $orangtua_wali['wali']['penghasilan'] ?? "",

                'telepon' => $orangtua_wali['telepon'] ?? "",
                'handphone' => $orangtua_wali['handphone'] ?? "",
                'email' => $orangtua_wali['email'] ?? "",

                'tinggi_badan' => $rincian['tinggi_badan'] ?? "",
                'berat_badan' => $rincian['berat_badan'] ?? "",
                'jauh_sekolah' => $rincian['jauh_sekolah'] ?? "",
                'jam' => $rincian['jam'] ?? "",
                'menit' => $rincian['menit'] ?? "",
                'jumlah_saudara' => $rincian['jumlah_saudara'] ?? "",

                'jenis_pendaftaran' => $registrasi['jenis_pendaftaran'] ?? "",
                'tanggal_masuk_sekolah' => $registrasi['tanggal_masuk_sekolah'] ?? "",
                'asal_sekolah' => $registrasi['asal_sekolah'] ?? "",
                'nomor_peserta_ujian' => $registrasi['nomor_peserta_ujian'] ?? "",
                'no_ijazah' => $registrasi['no_ijazah'] ?? "",
                'no_skhu' => $registrasi['no_skhu'] ?? "",
            ];
        }


        return collect($data);
    }

    public function headings(): array
    {
        return [
            'id',
            'nis',
            'tahun_masuk',
            'name',
            'jk',
            'kelas_id',
            'jurusan_id',
            'status',

            'tempat_lahir',
            'tanggal_lahir',
            'nomor_akta',
            'agama',
            'jenis_kelamin',
            'kewarganegaraan',
            'jalan',
            'rt',
            'rw',
            'dusun',
            'kelurahan',
            'kecamatan',
            'kodepos',
            'lintang',
            'bujur',
            'tempat_tinggal',
            'moda_transportasi',
            'nomor_kks',
            'penerima_kps',
            'anak_keberapa',
            'no_kps',
            'penerima_kip',
            'usulan_kip_sekolah',
            'nomor_kip',
            'nama_kip',
            'terima_fisik_kip',
            'alasan_layak_pip',
            'bank',
            'no_rekening',
            'nama_rekening',

            'ayah_nama_lengkap',
            'ayah_nik',
            'ayah_tahun_lahir',
            'ayah_pendidikan',
            'ayah_pekerjaan',
            'ayah_penghasilan',
            'ibu_nama_lengkap',
            'ibu_nik',
            'ibu_tahun_lahir',
            'ibu_pendidikan',
            'ibu_pekerjaan',
            'ibu_penghasilan',
            'wali_nama_lengkap',
            'wali_nik',
            'wali_tahun_lahir',
            'wali_pendidikan',
            'wali_pekerjaan',
            'wali_penghasilan',
            'telepon',
            'handphone',
            'email',

            'tinggi_badan',
            'berat_badan',
            'jauh_sekolah',
            'jam',
            'menit',
            'jumlah_saudara',

            'jenis_pendaftaran',
            'tanggal_masuk_sekolah',
            'asal_sekolah',
            'nomor_peserta_ujian',
            'no_ijazah',
            'no_skhu',
        ];
    }
}
