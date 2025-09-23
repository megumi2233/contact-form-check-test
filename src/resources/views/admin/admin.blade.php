@extends('layouts.app')

@section('title', '管理画面')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<h1 class="admin__title">管理画面</h1>

<!-- 検索フォーム -->
<form method="GET" action="{{ route('admin.search') }}" class="admin__search-form">
    <input type="text" name="name" placeholder="名前を入力してください">
    <select name="type">
        <option value="">お問い合わせの種類</option>
        <option value="使い方">商品の使い方について</option>
        <option value="故障">商品の故障について</option>
        <option value="対応">ショップの対応について</option>
        <option value="その他">その他</option>
    </select>
    <input type="date" name="date">
    <button type="submit" class="btn btn--search">検索</button>
    <button type="reset" class="btn btn--reset">リセット</button>
</form>

<!-- ユーザー一覧テーブル -->
<table class="admin__table">
    <thead>
        <tr>
            <th>会社名</th>
            <th>名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>株式会社テスト</td>
            <td>山田 太郎</td>
            <td>男性</td>
            <td>test@example.com</td>
            <td>商品の届けについて</td>
            <td>
                <label for="modalToggle" class="btn btn--detail">詳細</label>
            </td>
        </tr>
    </tbody>
</table>

<!-- ページネーション（仮） -->
<div class="admin__pagination">
    <span class="page">1</span>
    <span class="page">2</span>
    <span class="page">3</span>
</div>

<!-- モーダル制御用チェックボックス -->
<input type="checkbox" id="modalToggle" class="admin__modal-toggle" hidden>

<!-- モーダルウィンドウ -->
<div class="admin__modal">
    <label for="modalToggle" class="admin__modal-overlay"></label>
    <div class="admin__modal-content">
        <label for="modalToggle" class="admin__modal-close">×</label>
        <h2>ユーザー詳細</h2>
        <p><strong>お名前：</strong> 山田 太郎</p>
        <p><strong>性別：</strong> 男性</p>
        <p><strong>メールアドレス：</strong> test@example.com</p>
        <p><strong>電話番号：</strong> 080xyz45678</p>
        <p><strong>ご住所：</strong> 東京都千代田区</p>
        <p><strong>ご職業：</strong> 会社員</p>
        <p><strong>お問い合わせの種類：</strong> 商品のお届けについて</p>
        <p><strong>お問い合わせ内容：</strong> 商品がまだ届いていません。注文した日からすでに1週間が経過しています。確認をお願いします。</p>
        <label for="modalToggle" class="btn btn--close">閉じる</label>
    </div>
</div>
@endsection
