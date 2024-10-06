@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="timestamp__content">
    <div class="timestamp__heading">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>

    <script>
        window.onload = function() {
            document.getElementById("workEndButton").disabled = true;
            document.getElementById("restStartButton").disabled = true;
            document.getElementById("restEndButton").disabled = true;
        };

        function workStart() {
            document.getElementById("workStartButton").disabled = true;
            document.getElementById("workEndButton").disabled = false;
            document.getElementById("restStartButton").disabled = false;
            document.getElementById("restEndButton").disabled = true;
        }

        function restStart() {
            document.getElementById("workStartButton").disabled = true;
            document.getElementById("workEndButton").disabled = true;
            document.getElementById("restStartButton").disabled = true;
            document.getElementById("restEndButton").disabled = false;
        }

        function restEnd() {
            document.getElementById("workStartButton").disabled = true;
            document.getElementById("workEndButton").disabled = false;
            document.getElementById("restStartButton").disabled = false;
            document.getElementById("restEndButton").disabled = true;
        }

        function workEnd() {
            document.getElementById("workStartButton").disabled = true;
            document.getElementById("workEndButton").disabled = true;
            document.getElementById("restStartButton").disabled = true;
            document.getElementById("restEndButton").disabled = true;
        }
    </script>
    <form class="timestamp__form" action="/work/start" method="post">
        @csrf
        <button class="timestamp__form-button" id="workStartButton">
            勤務開始
        </button>
    </form>
    <form class="timestamp__form" action="/work/end" method="post">
        @csrf
        <button class="timestamp__form-button" id="workEndButton">
            勤務終了
        </button>
    </form>
    <form class="timestamp___form" action="/rest/start" method="post">
        @csrf
        <button class="timestamp__form-button" id="restStartButton">
            休憩開始
        </button>
    </form>
    <form class="timestamp__form" action="/rest/end" method="post">
        @csrf
        <button class="timestamp__form-button" id="restEndButton">
            休憩終了
        </button>
    </form>
</div>
@endsection