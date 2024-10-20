@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance-list">
    <div class="date-navigation">
        <form method="get" action="{{ route('attendance')}}" style="display: inline;">
            <button type="submit" name="date" value="{{ \Carbon\Carbon::parse($date)->subDay()}->format('Y-m-d') }}">
                &lt;
            </button>
        </form>

        <h2 style="display: inline">{{ $date }}</h2>

        <form method="get" action="{{ (route('attendance')) }}" style="display: inline;">
            <button type="submit" name="date" value="{{ \Carbon\Carbon::parse($date)->addDay()->format('Y-m-d') }}">
                &gt;
            </button>
        </form>
    </div>

    <table class="attendance-table">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach($attendances as $attendance)
        <tr>
            <td>{{ $attendance['name'] }}</td>
            <td>{{ $attendance['start_time'] }}</td>
            <td>{{ $attendance['end_time'] }}</td>
            <td>{{ $attendance['rest_time'] }}</td>
            <td>{{ $attendance['work_time'] }}</td>
        </tr>
        @endforeach
    </table>

    <div class="pagination">
        {{ $attendances->links() }}
    </div>
</div>
@endsection