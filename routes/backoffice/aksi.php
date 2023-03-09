<?php

use App\Http\Controllers\Backoffice\AksiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/backoffice/grup')
    ->middleware(['auth', 'prevent-back-history', 'permission'])
    ->group(function () {
        Route::get('aksi/{menu_id}/{grup_id}', [AksiController::class, 'create'])->name('aksi.create');
        Route::post('aksi', [AksiController::class, 'store'])->name('aksi.store');
        Route::get('aksi/{aksi}/{menu_id}/{grup_id}', [AksiController::class, 'edit'])->name('aksi.edit');
        Route::put('aksi/{aksi}', [AksiController::class, 'update'])->name('aksi.update');
        Route::delete('aksi/{id}/{grup_id}', [AksiController::class, 'destroy'])->name('aksi.destroy');
    });
