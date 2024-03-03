@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section('header-link')
<form class="header__form" action="/logout" method="post">
    @csrf
    <button class="header__form-button--logout">logout</button>
</form>
@endsection

@section('content')
<dialog id="contactDetailModal">
    <Button class="closeButton">✖</Button>
    <h2>Contact Detail</h2>
    <!-- ここに詳細情報を表示するための要素を追加 -->
</dialog>

<div class="admin__content">
    <div class="admin__content-wrapper">
        <div class="admin__content-inner">
            <div class="admin__heading">
                <h2 class="admin__heading-title">Admin</h2>
            </div>
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <div class="search-form__block">
                    <input class="search-form__item-input-keyword" type="text" name="keyword"
                    placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
                    <select class="search-form__item-select-gender" name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="search-form__item-select-category" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" class="search-form__item-input-date" name="created_at"
                    value="年/月/日">
                    <button class="search-form__button--submit" type="submit">検索</button>
                    <input class="search-form__button--reset" type="reset" value="リセット">
                </div>
            </form>
            <div class="function-block">
                <a class="export-button" href="">エクスポート</a>
                <div class="paginate">
                    {{ $contacts->links() }}
                </div>
            </div>
            <div class="contact-table">
                <table class="contact-table__inner">
                    <tr class="contact-table__header">
                        <th class="contact-table__header--name">お名前</th>
                        <th class="contact-table__header--gender">性別</th>
                        <th class="contact-table__header--email">メールアドレス</th>
                        <th class="contact-table__header--category">お問い合わせの種類</th>
                        <th></th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="contact-table__data">
                        <td class="contact-table__data--name">{{ $contact['last_name'] . '　' . $contact['first_name'] }}</td>
                        <td class="contact-table__data--gender">{{ $contact->genderLabel }}</td>
                        <td class="contact-table__data--email">{{ $contact['email'] }}</td>
                        <td class="contact-table__data--category">{{ $contact['category']['content'] }}</td>
                        <td>
                            <button class="contact-table__detail-button openButton">詳細</button>
                        </td >
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const contactDetailModal = document.getElementById('contactDetailModal');
    const closeModalButton = document.querySelector('#contactDetailModal .closeButton');
    const openModalButtons = document.querySelectorAll('.openButton');

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            // const contactId = button.dataset.contactId;
            // $.ajax({
            //     url: '/admin/detail/' + contactId,
            //     method: 'GET',
            //     success: function(response) {
            //         $('#contactDetailModal').html(response);
            showModal(contactDetailModal);
        });
        // error: function(xhr, status, error) {
        //     console.error(error);
        // }
            // });
        // });
    });

    closeModalButton.addEventListener('click', () => {
        hideModal(contactDetailModal);
    });

    function showModal(modal) {
        modal.showModal();
    }

    function hideModal(modal) {
        modal.close();
    }
</script>
@endsection