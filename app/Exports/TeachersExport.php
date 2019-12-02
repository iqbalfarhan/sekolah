<?php

namespace App\Exports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{
	
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all([
        	'id',
        	'nign',
        	'nama',
        	'pendidikan_terakhir',
        	'jk',
        	'tempat_lahir',
        	'tanggal_lahir',
        	'status',
        	'tanggal_masuk',
        	'alamat',
        	'telepon',
        	'agama',
        	'deleted_at',
        	'created_at',
        	'updated_at',
        ]);
    }

    public function headings(): array
    {
    	return [
    		'id',
    		'NIGN',
    		'Nama Lengkap',
    		'Pendidikan Terakhir',
    		'Jenis Kelamin',
    		'Tempat Lahir',
    		'Tanggal Lahir',
    		'Status',
    		'Tanggal Masuk',
    		'Alamat',
    		'Telepon',
    		'Agama',
    		'deleted_at',
    		'created_at',
    		'update_at',
    	];
    }
}
