<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'nign' => $row['nign'],
            'nama' => $row['nama'],
            'pendidikan_terakhir' => $row['pendidikan_terakhir'],
            'jk' => $row['jk'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => Carbon::instance(\PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir'])),
            'status' => $row['status'] ?? 1,
            'tanggal_masuk' => Carbon::instance(\PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tanggal_masuk'])),
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
            'agama' => $row['agama'],
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
