<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{

	protected $fillable = ['siswa_id', 'alasan', 'tanggal', 'keterangan'];

    public function student()
    {
    	return $this->belongsTo(Student::class(), 'siswa_id', 'id');
    }
}
