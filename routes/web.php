<?php

use Illuminate\Support\Facades\Route;
use MohasinDev\ColumnVisibility\Http\Controllers\ColumnPreferenceController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/preferences/{tableKey}', [ColumnPreferenceController::class, 'get']);
    Route::post('/preferences/save', [ColumnPreferenceController::class, 'save']);
});
