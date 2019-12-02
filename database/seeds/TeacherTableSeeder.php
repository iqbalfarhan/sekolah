<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*factory(App\Teacher::class, 15)->create();
    	factory(App\User::class, 5)->create();
        factory(App\Jurusan::class, 6)->create();
        factory(App\Kelas::class, 6)->create();
        factory(App\Student::class, 100)->create();*/

    	App\User::insert([
    		'name' => 'Administrator',
    		'email' => 'admin@appsekolah.com',
    		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
    		'role' => 'admin',
    		'photo' => 'default.png', //adminoke
            'created_at' => now(),
    		'remember_token' => Str::random(10),
    	]);

        App\User::insert([
            'name' => 'Admin PPDB',
            'email' => 'ppdb@appsekolah.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'role' => 'ppdb',
            'photo' => 'default.png', //adminoke
            'created_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        App\User::insert([
            'name' => 'Peserta PPDB',
            'email' => 'peserta.ppdb@appsekolah.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'role' => 'register',
            'photo' => 'default.png', //adminoke
            'created_at' => now(),
            'remember_token' => Str::random(10),
        ]);

    }
}
