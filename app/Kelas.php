<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function teacher()
    {
    	return $this->hasOne(Teacher::class, 'id', 'walikelas');
    }

    public function siswa()
    {
    	return $this->hasMany(Student::class, 'kelas_id', 'id');
    }
}
