<?php

use App\Http\Controllers\Backoffice\GrupController;
use Illuminate\Support\Facades\Route;

Route::prefix('/backoffice')
    ->middleware(['auth', 'prevent-back-history', 'permission'])
    ->group(function () {
        Route::get('grup/hak-akses/{grup}', [GrupController::class, 'permissionCreate'])->name('grup.permissionCreate');
        Route::post('grup/hak-akses/{grup}', [GrupController::class, 'permissionSync'])->name('grup.permissionSync');
        Route::resource('grup', GrupController::class)->except([
            'show'
        ]);
    });
