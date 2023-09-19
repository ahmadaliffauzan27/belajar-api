<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('isiAkun', function () {

    // Data pengguna yang akan disimpan di tabel users

    $users = [
        [
            'name' => 'Ahmad Alif Fauzan',
            'email' => 'ahmadaliffauzan@gmail.com',
            'password' => bcrypt('Ahmad999'),
        ]
        ];

    // Simpan data pengguna ke dalam tabel users
    foreach ($users as $user) {
        DB::table('users')->insert($user);
    }

    return 'Data pengguna berhasil ditambahkan ke tabel "users".';
});
