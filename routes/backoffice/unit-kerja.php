<?php

use App\Http\Controllers\Backoffice\UnitKerjaController;
use Illuminate\Support\Facades\Route;

Route::prefix('/backoffice')
    ->middleware(['auth', 'prevent-back-history', 'permission'])
    ->group(function () {
        Route::resource('unit-kerja', UnitKerjaController::class)->except([
            'show'
        ]);;
    });
