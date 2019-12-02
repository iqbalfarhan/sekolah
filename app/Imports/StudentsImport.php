<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Student;
use App\Detail_siswa;
use App\Jurusan;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $siswa = Student::create([
                'nis' => $row['nis'] ?? "",
                'tahun_masuk' => $row['tahun_masuk'] ?? 0,
                'name' => $row['name'] ?? "",
                'jk' => $row['jk'] ?? "l",
                'kelas_id' => $row['kelas_id'] ?? 0,
                'jurusan_id' => Jurusan::where('inisial', $row['jurusan_id'])->first()->id ?? 0,
                'status' => $row['status'] ?? "aktif",
            ]);

            $data_pribadi = [
                'nama_lengkap' => $row['name'] ?? "",
                'nisn' => $row['nis'] ?? "",
                'nik' => $row['nik'] ?? "",
                'tempat_lahir' => $row['tempat_lahir'] ?? "",
                'tanggal_lahir' => Carbon::instance(\PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir'])) ?? date('0000-00-00'),
                'nomor_akta' => $row['nomor_akta'] ?? "",
                'agama' => $row['agama'] ?? "islam",
                'jenis_kelamin' => $row['jenis_kelamin'] ?? 'l',
                'kewarganegaraan' => $row['kewarganegaraan'] ?? "",
                'kebutuhan_khusus' => null,
                'alamat' => [
                    'jalan' => $row['jalan'] ?? "",
                    'rt' => $row['rt'] ?? "",
                    'rw' => $row['rw'] ?? "",
                    'dusun' => $row['dusun'] ?? "",
                    'kelurahan' => $row['kelurahan'] ?? "",
                    'kecamatan' => $row['kecamatan'] ?? "",
                    'kodepos' => $row['kodepos'] ?? "",
                    'lintang' => $row['lintang'] ?? "",
                    'bujur' => $row['bujur'] ?? "",
                ],
                'tempat_tinggal' => $row['tempat_tinggal'] ?? "",
                'moda_transportasi' => $row['moda_transportasi'] ?? "",
                'nomor_kks' => $row['nomor_kks'] ?? "",
                'penerima_kps' => $row['penerima_kps'] ?? "",
                'anak_keberapa' => $row['anak_keberapa'] ?? "",
                'no_kps' => $row['no_kps'] ?? "",
                'penerima_kip' => $row['penerima_kip'] ?? "",
                'usulan_kip_sekolah' => $row['usulan_kip_sekolah'] ?? "",
                'nomor_kip' => $row['nomor_kip'] ?? "",
                'nama_kip' => $row['nama_kip'] ?? "",
                'terima_fisik_kip' => $row['terima_fisik_kip'] ?? "",
                'alasan_layak_pip' => $row['alasan_layak_pip'] ?? "",
                'bank' => $row['bank'] ?? "",
                'no_rekening' => $row['no_rekening'] ?? "",
                'nama_rekening' => $row['nama_rekening'] ?? "",
            ];

            $orangtua_wali = [
                'ayah' => [
                    'nama_lengkap' => $row['ayah_nama_lengkap'] ?? "",
                    'nik' => $row['ayah_nik'] ?? "",
                    'tahun_lahir' => $row['ayah_tahun_lahir'] ?? "",
                    'pendidikan' => $row['ayah_pendidikan'] ?? "",
                    'pekerjaan' => $row['ayah_pekerjaan'] ?? "",
                    'penghasilan' => $row['ayah_penghasilan'] ?? "",
                    'kebutuhan_khusus' => null,
                ],
                'ibu' => [
                    'nama_lengkap' => $row['ibu_nama_lengkap'] ?? "",
                    'nik' => $row['ibu_nik'] ?? "",
                    'tahun_lahir' => $row['ibu_tahun_lahir'] ?? "",
                    'pendidikan' => $row['ibu_pendidikan'] ?? "",
                    'pekerjaan' => $row['ibu_pekerjaan'] ?? "",
                    'penghasilan' => $row['ibu_penghasilan'] ?? "",
                    'kebutuhan_khusus' => null,
                ],
                'wali' => [
                    'nama_lengkap' => $row['nama_lengkap'] ?? "",
                    'nik' => $row['nik'] ?? "",
                    'tahun_lahir' => $row['tahun_lahir'] ?? "",
                    'pendidikan' => $row['pendidikan'] ?? "",
                    'pekerjaan' => $row['pekerjaan'] ?? "",
                    'penghasilan' => $row['penghasilan'] ?? "",
                ],
                'telepon' => $row['telepon'] ?? "",
                'handphone' => $row['handphone'] ?? "",
                'email' => $row['email'] ?? "",
            ];

            $rincian = [
                'tinggi_badan' => $row['tinggi_badan'] ?? "",
                'berat_badan' => $row['berat_badan'] ?? "",
                'jauh_sekolah' => $row['jauh_sekolah'] ?? "",
                'waktu_tempuh' => [
                    'jam' => $row["jam"] ?? "",
                    'menit' => $row["menit"] ?? "",
                ],
                'jumlah_saudara' => $row["jumlah_saudara"] ?? "",
            ];

            $registrasi = [
                'jenis_pendaftaran' => $row["jenis_pendaftaran"] ?? "",
                'tanggal_masuk_sekolah' => Carbon::instance(\PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tanggal_masuk_sekolah'])) ?? date('0000-00-00'),
                'asal_sekolah' => $row["asal_sekolah"] ?? "",
                'nomor_peserta_ujian' => $row["nomor_peserta_ujian"] ?? "",
                'no_ijazah' => $row["no_ijazah"] ?? "",
                'no_skhu' => $row["no_skhu"] ?? "",
            ];

            Detail_siswa::create([
                'siswa_id' => $siswa->id,
                'data_pribadi' => json_encode($data_pribadi),
                'orangtua_wali' => json_encode($orangtua_wali),
                'rincian' => json_encode($rincian),
                'registrasi' => json_encode($registrasi),
            ]);
        }
    }

    public function headingRow(): int
    {
        return 5;
    }
}
