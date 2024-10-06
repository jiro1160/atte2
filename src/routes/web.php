<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'getStamp']);
    Route::post('/work/start', [AttendanceController::class, 'startWork']);
    Route::post('/work/end', [AttendanceController::class, 'endWork']);
});
