@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-link')
<a href="/register" class="header__link--register">register</a>
@endsection

@section('content')
<div class="login__content">
    <div class="login__content-wrapper">
        <div class="login__content-inner">
            <div class="login__heading">
                <h2 class="login__heading-title">Login</h2>
            </div>
            <div class="login__form">
                <form class="login__form-inner" action="/login" method="post">
                    @csrf
                    <div class="form__group">
                        <p class="form__label">メールアドレス</p>
                        <div class="form__input">
                            <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <div class="form__error">
                            {{ $errors->first('email') }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__group">
                        <p class="form__label">パスワード</p>
                        <div class="form__input">
                            <input type="text" name="password" placeholder="例: coachtech1106">
                        </div>
                        @error('password')
                        <div class="form__error">
                            {{ $errors->first('password') }}
                        </div>
                        @enderror
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection