<?php

use App\Http\Controllers\Backoffice\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('/backoffice')
    ->middleware(['auth', 'prevent-back-history', 'permission'])
    ->group(function () {
        Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    });
