@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__form">
    <h2 class="login-form__heading content__heading">Login</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="/login" method="post">
            @csrf
            <div class="login-form__group">
                <input class="login-form__input" type="mail" name="email" placeholder="メールアドレス">
                <p class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form_group">
                <input class="login-form__input" type="password" name="password" placeholder="パスワード">
                <p>
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="login-form_btn btn" type="submit" value="ログイン">
        </form>
    </div>
</div>
@endsection