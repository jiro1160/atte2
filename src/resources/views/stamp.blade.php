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
            // 初期状態でボタンを無効にする
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

    <div class="button-container">
        <form class="form" action="/work/start" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" id="workStartButton" onclick="workStart()">勤務開始</button>
            </div>
        </form>
        <form class="form" action="/work/end" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" id="workEndButton">勤務終了</button>
            </div>
        </form>
        <form class="form" action="/rest/start" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" id="restStartButton" onclick="restStart()">休憩開始</button>
            </div>
        </form>
        <form class="form" action="/rest/end" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" id="restEndButton" onclick="restEnd()">休憩終了</button>
            </div>
        </form>
    </div>

</div>
@endsection