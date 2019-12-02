<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $fillable = ['nign', 'nama', 'pendidikan_terakhir', 'jk', 'tempat_lahir', 'tanggal_lahir', 'status', 'tanggal_masuk', 'alamat', 'telepon', 'agama'];
	
	public function mapelguru()
	{
		return $this->hasMany('App\Mapelguru', 'teacher_id', 'id');
	}
	
}
