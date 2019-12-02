<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('teacher', function()
{
	$teachers = App\Teacher::all();

	foreach ($teachers as $teacher) {
		$data[] = [
			"nign" => $teacher->nign,
			"nama" => $teacher->nama,
			"photo" => Storage::url($teacher->photo),
		];
	}
	return response()->json($data ?? null);
});

Route::get('teacher/count', function()
{
	$data = [
		'count' => App\Teacher::count() ?? 0,
	];
	return response()->json($data);
});

Route::get('student', function()
{
	return response()->json(['count' => App\Student::count() ?? 0]);
});


Route::get('sekolah', function()
{
	$sekolah = App\Sekolah::first();

	if(isset($sekolah->logo)){
		$logo = Strorage::url($sekolah->logo);
	}
	else{
		$logo = "";
	}

	$data = [
		"nama_sekolah" => $sekolah->nama_sekolah ?? "",
		"npsm" => $sekolah->npsm ?? "",
		"alamat" => $sekolah->alamat ?? "",
		"telepon" => $sekolah->telepon ?? "",
		"email" => $sekolah->email ?? "",
		"logo" => $logo
	];

	return response()->json($data ?? null);
});
