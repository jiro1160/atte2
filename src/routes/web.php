<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'getStamp']);
});
