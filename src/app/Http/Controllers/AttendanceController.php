<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Work;

class AttendanceController extends Controller
{
    public function getStamp()
    {
        return view('stamp');
    }

    public function startWork()
    {
        $userId = Auth::user()->id;
        $year_and_day = Carbon::now()->format('Y-d');
        $current_time = Carbon::now()->format('H:i:s');
    }

    public function endWork() {}

    public function startRest() {}

    public function endRest() {}
}
