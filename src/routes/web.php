<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'getStamp']);
    Route::get('/attendance', [AttendanceController::class, 'getAttendance'])->name('attendance');
    Route::post('/work/start', [AttendanceController::class, 'startWork']);
    Route::post('/work/end', [AttendanceController::class, 'endWork']);
    Route::post('/rest/start', [AttendanceController::class, 'startRest']);
    Route::post('/rest/end', [AttendanceController::class, 'endRest']);
});

