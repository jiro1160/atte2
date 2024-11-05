<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Work;
use App\Models\Rest;

class AttendanceController extends Controller
{
    public function getStamp()
    {
        $userId = auth()->id();

        $work = Work::where('users_id', $userId)
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->first();

        if (!$work) {
            $status = 0;
        } elseif ($work->end_time) {
            $status = 3;
        } else {
            $rest = Rest::where('works_id', $work->id)
                ->whereNull('end_time')
                ->first();

            if ($rest) {
                $status = 2;
            } else {
                $status = 1;
            }
        }

        return view('stamp')->with('status', $status);
    }

    public function startWork()
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::now()->format('H:i:s');

        $existingWork = Work::where('users_id', $userId)
            ->where('work_date', $workDate)
            ->first();

        if (!$existingWork) {
            $work = new Work();
            $work->users_id = $userId;
            $work->work_date = $workDate;
            $work->start_time = $startTime;
            $work->save();
        }

        return redirect('/');
    }

    public function endWork()
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $endTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)
            ->where('work_date', $workDate)
            ->first();

        if ($work) {
            $work->end_time = $endTime;
            $work->save();
        }

        return redirect('/');
    }

    public function startRest()
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)
            ->where('work_date', $workDate)
            ->first();

        if ($work) {
            $rest = new Rest();
            $rest->works_id = $work->id;
            $rest->start_time = $startTime;
            $rest->save();
        }

        return redirect('/');
    }

    public function endRest()
    {
        $userId = auth()->id();
        $workDate = Carbon::now()->format('Y-m-d');
        $endTime = Carbon::now()->format('H:i:s');

        $work = Work::where('users_id', $userId)->where('work_date', $workDate)->first();

        if ($work) {
            $rest = Rest::where('works_id', $work->id)
                ->whereNull('end_time')
                ->first();

            if ($rest) {
                $rest->end_time = $endTime;
                $rest->save();
            }
        }

        return redirect('/');
    }

    public function getAttendance(Request $request)
    {
        $date = $request->input('date', Carbon::now()->format('Y-m-d'));

        $works = Work::with(['user', 'rests'])
        ->where('work_date', $date)
            ->paginate(5);

        $attendances = $works->map(function ($work) {
            $totalRestMinutes = 0;

            if ($work->rests) {
                foreach ($work->rests as $rest) {
                    $restStart = Carbon::parse($rest->start_time);
                    $restEnd = $rest->end_time ? Carbon::parse($rest->end_time) : Carbon::parse($work->end_time);
                    $totalRestMinutes += $restStart->diffInMinutes($restEnd);
                }
            }

            $start_time = Carbon::parse($work->start_time);
            $end_time = $work->end_time ? Carbon::parse($work->end_time) : Carbon::parse($work->start_time)->addHours(8);
            $totalWorkMinutes = $start_time->diffInMinutes($end_time);

            $formattedRestTime = gmdate('H:i:s', $totalRestMinutes * 60);
            $formattedWorkTime = gmdate('H:i:s', ($totalWorkMinutes - $totalRestMinutes) * 60);

            return [
                'name' => $work->user->name,
                'start_time' => $work->start_time,
                'end_time' => $work->end_time ?? $end_time->format('H:i'),
                'rest_time' => $formattedRestTime,
                'work_time' => $formattedWorkTime
            ];
        });

        return view('attendance', [
            'attendances' => $attendances,
            'works' => $works,
            'date' => $date
        ]);
    }
}
