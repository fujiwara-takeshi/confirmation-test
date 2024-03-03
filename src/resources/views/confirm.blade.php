@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__content-wrapper">
        <div class="confirm__content-inner">
            <div class="confirm__heading">
                <h2 class="confirm__heading-title">Confirm</h2>
            </div>
            <form class="confirm-form" action="/thanks" method="post">
                @csrf
                <table class="form-table">
                    <tr class="form-table__row">
                        <th class="form-table__header">お名前</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $contact['last_name'] . '　' . $contact['first_name'] }}</p>
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">性別</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $genderLabel }}</p>
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">メールアドレス</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $contact['email'] }}</p>
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">電話番号</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $contact['area_code'] . $contact['exchange_code1'] . $contact['exchange_code2'] }}</p>
                            <input type="hidden" name="tel" value="{{ $contact['area_code'] . $contact['exchange_code1'] . $contact['exchange_code2'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">住所</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $contact['address'] }}</p>
                            <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">建物名</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $contact['building'] }}</p>
                            <input type="hidden" name="building" value="{{ $contact['building'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">お問い合わせの種類</th>
                        <td class="form-table__input">
                            <p class="form-table__input--display">{{ $categories->where('id', $contact['category_id'])->first()->content }}</p>
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        </td>
                    </tr>
                    <tr class="form-table__row">
                        <th class="form-table__header">お問い合わせ内容</th>
                        <td class="form-table__input">
                            <textarea name="detail" cols="30" rows="3" readonly>{{ $contact['detail'] }}</textarea>
                        </td>
                    </tr>
                </table>
                <div class="form__button-area">
                    <button class="form__button-send" type="submit">送信</button>
                    <a class="form__link-return" href="#" onclick="history.back(-1)">修正</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection