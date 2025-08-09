<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorLogController;

Route::get('/', function () {
    return view('aquitoy');
});

Route::get('/visitor-log', [VisitorLogController::class, 'index'])->name('visitor-log.index');
Route::post('/visitor-log', [VisitorLogController::class, 'store'])->name('visitor-log.store');

Route::get('/destroy', [VisitorLogController::class, 'destroyAll'])->name('visitor-log.destroyAll');
