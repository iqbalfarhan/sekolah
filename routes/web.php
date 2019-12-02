<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' ,function () {
    return redirect('login');
})->middleware('guest');

Route::get('/ppdbonline' ,function () {
	$setting = App\Ppdb_setting::first() ?? "";
	$sekolah = App\Sekolah::first() ?? "";
    return view('ppdbonline', ['sekolah' => $sekolah, 'setting' => $setting]);
})->middleware('guest');

Route::get('/ppdb_expired', function(){
	return "expred";
});

/* Route Sekolah */
Route::get('/sekolah', 'HomeController@sekolah_edit')->name('sekolah.edit');
Route::put('/sekolah/', 'HomeController@sekolah_update')->name('sekolah.update');
Route::post('/sekolah/', 'HomeController@sekolah_upload')->name('sekolah.upload');

/*Route Home lainnya*/
Route::get('/akun', 'HomeController@akun')->name('akun');
Route::get('/saya', 'HomeController@account_setting')->name('saya');
Route::post('/saya', 'HomeController@login_update')->name('saya.update');
Route::post('saya/upload_photo', 'HomeController@photo_upload')->name('akun.upload_photo');


/* Route edit siswa */
Route::put('student/edit/datadiri', 'StudentController@edit_datadiri')->name('student.edit.datadiri');
Route::put('student/edit/orangtua', 'StudentController@edit_orangtua')->name('student.edit.orangtua');
Route::put('student/edit/rincian', 'StudentController@edit_rincian')->name('student.edit.rincian');
Route::put('student/edit/registrasi', 'StudentController@edit_registrasi')->name('student.edit.registrasi');
Route::post('student/photo/{student}', 'StudentController@photo_upload')->name('student.photo.upload');
Route::post('student/berkas/{student}', 'StudentController@berkas_upload')->name('student.berkas.upload');
Route::get('student/hapus/', 'StudentController@berkas_hapus')->name('student.berkas.hapus');
Route::get('student/deleted/', 'StudentController@deleted')->name('student.deleted');
Route::get('student/{student}/restore', 'StudentController@restore')->name('student.restore');
Route::delete('student/{student}/forcedelete', 'StudentController@forcedelete')->name('student.forceDelete');
Route::get('student/pindah', 'StudentController@kelas_change')->name('student.kelasChange');
Route::put('student/pindah', 'StudentController@kelas_update')->name('student.kelasChange.update');
Route::get('student/import', 'StudentController@import')->name('student.import');
Route::post('student/import', 'StudentController@import_store')->name('student.import.store');
Route::get('student/export', 'StudentController@export')->name('student.export');

/* Route edit Guru */
Route::post('guru/photo/{teacher}', 'TeacherController@photo_upload')->name('teacher.photo.upload');
Route::get('teacher/deleted/', 'TeacherController@deleted')->name('teacher.deleted');
Route::get('teacher/{teacher}/restore', 'TeacherController@restore')->name('teacher.restore');
Route::delete('teacher/{teacher}/forcedelete', 'TeacherController@forcedelete')->name('teacher.forceDelete');
Route::get('teacher/import', 'TeacherController@import')->name('teacher.import');
Route::post('teacher/import', 'TeacherController@import_store')->name('teacher.import.store');
Route::get('teacher/export', 'TeacherController@export')->name('teacher.export');

/* Route PPDB Admin */

Route::get('ppdbadmin/akun_list', 'PpdbadminController@akun_list')->name('ppdbadmin.akun_list');
Route::get('ppdbadmin/akun_create', 'PpdbadminController@akun_create')->name('ppdbadmin.akun_create');
Route::post('ppdbadmin/akun_store', 'PpdbadminController@akun_store')->name('ppdbadmin.akun_store');
Route::get('ppdbadmin/migrasi', 'PpdbadminController@migrasi')->name('ppdbadmin.migrasi');
Route::post('ppdbadmin/migrasi/{data}', 'PpdbadminController@migrasi_store')->name('ppdbadmin.migrasi_store');
Route::get('ppdbadmin/{user}/print', 'PpdbadminController@print_akun')->name('ppdbadmin.print');
Route::get('ppdbadmin/{user}/reset_password', 'PpdbadminController@reset_password')->name('ppdbadmin.reset_password');
Route::get('ppdbadmin/resetppdb', 'PpdbadminController@resetppdb')->name('ppdbadmin.resetppdb');


/*Route ppdb*/
Route::put('ppdb/{page}/edit', 'PpdbController@update')->name('ppdb.edit.datadiri');
Route::put('ppdb/photo', 'PpdbController@photo_upload')->name('ppdb.photo.upload');
Route::get('ppdb/pengaturan', 'PpdbController@pengaturan')->name('ppdb.pendaftar.pengaturan');
Route::put('ppdb/pengaturan', 'PpdbController@update_account')->name('ppdb.pendaftar.pengaturan.update');
Route::post('ppdb/berkas/{berkas}', 'PpdbController@berkas_upload')->name('ppdb.berkas.upload');
Route::put('ppdb/mendaftar', 'PpdbController@mendaftar')->name('ppdb.mendaftar');
Route::get('ppdb/pengumuman', 'PpdbController@pengumuman')->name('ppdb.pengumuman');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dokumentasi', 'HomeController@dokumentasi')->name('dokumentasi');

Route::resource('kelas', 'KelasController')->middleware(['auth', 'admin']);
Route::resource('absensi', 'AbsensiController')->middleware(['auth', 'admin']);
Route::resource('teacher', 'TeacherController')->middleware(['auth', 'admin']);
Route::resource('jurusan', 'JurusanController')->middleware(['auth', 'admin']);
Route::resource('student', 'StudentController')->middleware(['auth', 'admin']);
Route::resource('pengumuman', 'PengumumanController')->middleware(['auth', 'admin']);
Route::resource('ppdbadmin', 'PpdbadminController')->middleware(['auth', 'admin']);
Route::resource('keluar', 'KeluarController')->middleware(['auth', 'admin']);
Route::resource('user', 'UserController')->middleware(['auth', 'admin']);

Route::resource('ppdb', 'PpdbController')->middleware(['auth', 'register']);