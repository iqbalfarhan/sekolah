<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_siswa extends Model
{
	protected $fillable = ['siswa_id','data_pribadi', 'orangtua', 'rincian', 'registrasi'];
    public function student()
    {
    	return $this->belongsTo(App\Student::class, 'siswa_id', 'id');
    }
}
