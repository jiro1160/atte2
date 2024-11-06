@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="timestamp__content">
    <div class="timestamp__heading">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>

    <div class="button-container">
        <form class="form" action="/work/start" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" @if($status !=0) disabled @endif>勤務開始</button>
            </div>
        </form>
        <form class="form" action="/work/end" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" @if($status !=1) disabled @endif>勤務終了</button>
            </div>
        </form>
        <form class="form" action="/rest/start" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" @if($status !=1) disabled @endif>休憩開始</button>
            </div>
        </form>
        <form class="form" action="/rest/end" method="post">
            @csrf
            <div class="form__button">
                <button type="submit" class="form__button-submit" @if($status !=2) disabled @endif>休憩終了</button>
            </div>
        </form>
    </div>
</div>
@endsection