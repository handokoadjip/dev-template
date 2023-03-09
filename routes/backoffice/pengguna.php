<?php

use App\Http\Controllers\Backoffice\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::prefix('/backoffice')
    ->middleware(['auth', 'prevent-back-history', 'permission'])
    ->group(function () {
        Route::get('pengguna/lihat/{pengguna}', [PenggunaController::class, 'show'])->name('pengguna.show');
        Route::resource('pengguna', PenggunaController::class)->except([
            'show'
        ]);
    });
