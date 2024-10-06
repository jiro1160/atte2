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
        $user = Auth::user();

        $oldWork = Work::where('users_id', $user->id)->latest()->first();
        if ($oldWork) {
            $oldWorkStartTime = new Carbon($oldWork->startTime);
            $oldWorkDate = $oldWorkStartTime->startOfDay();
        }

        $newWorkDate = Carbon::today();

        if (($oldWorkDate == $newWorkDate) && (empty($oldWork->startTime))) {
            return redirect()->back();
        }

        $work = Work::create([
            'users_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function endWork()
    {
        $user = Auth::user();
        $work = Work::where('users_id', $user->id)->latest()->first();

        if (!empty($work->endTime)) {
            return redirect()->back();
        }
        $work->update([
            'endTime' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function startRest() {}

    public function endRest() {}
}
