<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Work;

class AttendanceController extends Controller
{
    public function getStamp()
    {
        return view('stamp');
    }

    public function startWork(Request $request)
    {
        $userId = auth()->id();

        $now = Carbon::now();
        $workDate = $now->format('Y-m-d');
        $startTime = $now->format('H:i:s');

        $existingWork = Work::where('users_id', $userId)->where('work_date', $workDate)->first();

        if ($existingWork) {
            $work = new Work();
            $work->users_id = $userId;
            $work->work_date = $workDate;
            $work->start_time = $startTime;
            $work->save();

            return redirect();
        }
    }

    public function endWork(Request $request)
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $endTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)->where('Work_date', $workDate)->first();

        if ($work) {
            $work->end_time = $endTime;
            $work->save();

            return redirect();
        }
    }

    public function startRest(Request $request)
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)->where('work_date', $workDate)->first();

        if ($work) {
            $rest = new Rest();
            $rest->works_id = $work->id;
            $rest->start_time = $startTime;
            $rest->save();

            return redirect();
        }
    }

    public function endRest(Request $request)
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $endTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)->where('work_date', $workDate)->first();

        if ($work) {
            $rest = Rest::where('works_id', $work->id)->whereNull('end_time')->first();

            if ($rest) {
                $rest->ent_time = $endTime;
                $rest->save();

                return redirect();
            }
        }
    }
}
