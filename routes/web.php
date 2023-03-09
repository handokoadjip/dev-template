<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__ . '/backoffice/pengguna.php';
require __DIR__ . '/backoffice/grup.php';
require __DIR__ . '/backoffice/aksi.php';
require __DIR__ . '/backoffice/menu.php';
require __DIR__ . '/backoffice/dashboard.php';
require __DIR__ . '/backoffice/unit-kerja.php';
require __DIR__ . '/auth.php';
