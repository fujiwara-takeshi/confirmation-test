<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>
    <div class="detail">
        <div class="detail__outer">
            <div class="detail__header">
                <a class="header__link-return" href="#" onclick="history.back(-1)">✖</a>
            </div>
            <div class="detail__inner">
                <table class="detail__table">
                    <tr class="table__row">
                        <th class="table__header">お名前</th>
                        <td class="table__data">{{ $contact['last_name'] . '　' . $contact['first_name'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">性別</th>
                        <td class="table__data">{{ $genderLabel }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">メールアドレス</th>
                        <td class="table__data">{{ $contact['email'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">電話番号</th>
                        <td class="table__data">{{ $contact['tel'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">住所</th>
                        <td class="table__data">{{ $contact['address'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">建物名</th>
                        <td class="table__data">{{ $contact['building'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">お問い合わせの種類</th>
                        <td class="table__data">{{ $contact['category']['content'] }}</td>
                    </tr>
                    <tr class="table__row">
                        <th class="table__header">お問い合わせ内容</th>
                        <td class="table__data">{{ $contact['detail'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="form__button-area">
                <form action="/detail/delete" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                    <button class="form__button-delete" type="submit">削除</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>