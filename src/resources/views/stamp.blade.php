@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="timestamp__content">
    <div class="timestamp__heading">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>
    <form class="timestamp__form" action="/work/start" method="post">
        @csrf
        <button class="timestamp__form-button">
            勤務開始
        </button>
    </form>
    <form class="timestamp__form" action="/work/end" method="post">
        @csrf
        <button class="timestamp__form-button">
            勤務終了
        </button>
    </form>
    <form class="timestamp___form" action="/rest/start" method="post">
        @csrf
        <button class="timestamp__form-button">
            休憩開始
        </button>
    </form>
    <form class="timestamp__form" action="/rest/end" method="post">
        @csrf
        <button class="timestamp__form-button">
            休憩終了
        </button>
    </form>
</div>
@endsection