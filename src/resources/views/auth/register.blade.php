@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-link')
<a href="/login" class="header__link--login">login</a>
@endsection

@section('content')
<div class="register__content">
    <div class="register__content-wrapper">
        <div class="register__content-inner">
            <div class="register__heading">
                <h2 class="register__heading-title">Register</h2>
            </div>
            <div class="register__form">
                <form class="register__form-inner" action="/register" method="post">
                    @csrf
                    <div class="form__group">
                        <p class="form__label">お名前</p>
                        <div class="form__input">
                            <input type="text" name="name" placeholder="例: 山田  太郎" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <div class="form__error">
                            {{ $errors->first('name') }}
                        </div>
                        @enderror
                    </div>
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
                        <button class="form__button-submit" type="submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection