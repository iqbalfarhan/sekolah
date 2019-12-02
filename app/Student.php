<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	//
	use SoftDeletes;

    protected $fillable = ['nis', 'name', 'jk', 'kelas_id', 'jurusan_id', 'tahun_masuk', 'status', 'photo'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function detail_siswa()
    {
    	return $this->hasOne(Detail_siswa::class, 'siswa_id', 'id');
    }

    public function keluar()
    {
        return $this->hasOne(Keluar::class, 'siswa_id', 'id');
    }
}
