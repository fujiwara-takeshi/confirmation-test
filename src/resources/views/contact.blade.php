@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__content-wrapper">
        <div class="contact__content-inner">
            <div class="contact__heading">
                <h2 class="contact__heading-title">Contact</h2>
            </div>
            <form class="contact-form" action="/confirm" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-name">
                            <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                            <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                        </div>
                        @error('last_name')
                        <div class="form__error">
                            {{ $errors->first('last_name') }}
                        </div>
                        @enderror
                        @error('first_name')
                        <div class="form__error">
                            {{ $errors->first('first_name') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__radio-gender">
                            <div class="form__radio--item">
                                <input type="radio" name="gender" value="1" id="male" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
                                <label class="form__radio--label" for="male">男性</label>
                                <input type="radio" name="gender" value="2" id="female" {{ old('gender') == '2' ? 'checked' : '' }}>
                                <label class="form__radio--label" for="female">女性</label>
                                <input type="radio" name="gender" value="3" id="others" {{ old('gender') == '3' ? 'checked' : '' }}>
                                <label class="form__radio--label" for="others">その他</label>
                            </div>
                        </div>
                        @error('gender')
                        <div class="form__error">
                            {{ $errors->first('gender') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-email">
                            <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <div class="form__error">
                            {{ $errors->first('email') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-tel">
                            <input type="text" name="area_code" placeholder="080" value="{{ old('area_code') }}">
                            <span>-</span>
                            <input type="text" name="exchange_code1" placeholder="1234" value="{{ old('exchange_code1') }}">
                            <span>-</span>
                            <input type="text" name="exchange_code2" placeholder="5678" value="{{ old('exchange_code2') }}">
                        </div>
                        @if ($errors->has('area_code') || $errors->has('exchange_code1') || $errors->has('exchange_code2'))
                        <div class="form__error">
                            {{ $errors->first('area_code') ?? $errors->first('exchange_code1') ?? $errors->first('exchange_code2') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-address">
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        </div>
                        @error('address')
                        <div class="form__error">
                            {{ $errors->first('address') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-building">
                            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-category">
                            <select name="category_id">
                                <option value="">選択してください</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="form__error">
                            {{ $errors->first('category_id') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-contact">
                            <textarea name="detail" cols="30" rows="6" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        </div>
                        @error('detail')
                        <div class="form__error">
                            {{ $errors->first('detail') }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection