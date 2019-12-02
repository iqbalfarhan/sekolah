<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function ppdb_berkas()
    {
    	return $this->hasMany(Ppdb_berkas::class);
    }

    public function inSession()
    {
    	return "s";
    }
}
