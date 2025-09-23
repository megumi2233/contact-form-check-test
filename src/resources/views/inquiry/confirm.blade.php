@extends('layouts.app')

@section('title', 'お問い合わせ内容確認')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

    <h1 class="confirm__title">お問い合わせ内容確認</h1>

    <table class="confirm__table">
        <tr>
            <th scope="row">お問い合わせ種別</th>
            <td>{{ $categoryName }}</td>
        </tr>
        <tr>
            <th scope="row">お名前</th>
            <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
        </tr>
        <tr>
            <th scope="row">メールアドレス</th>
            <td>{{ $inputs['email'] }}</td>
        </tr>
        <tr>
            <th scope="row">電話番号</th>
            <td>{{ $inputs['tel'] }}</td>
        </tr>
        <tr>
            <th scope="row">性別</th>
            <td>
                @if ($inputs['gender'] === 'male')
                    男性
                @elseif ($inputs['gender'] === 'female')
                    女性
                @else
                    その他
                @endif
            </td>
        </tr>
        <tr>
            <th scope="row">お問い合わせ内容</th>
            {{-- 改行を保持して表示 --}}
            <td>{!! nl2br(e($inputs['message'])) !!}</td>
        </tr>
    </table>

    <form action="{{ route('inquiry.thanks') }}" method="POST">
        @csrf
        {{-- hidden フィールドで値を保持 --}}
        <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">
        <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        <input type="hidden" name="building" value="{{ $inputs['building'] }}">
        <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
        <input type="hidden" name="message" value="{{ $inputs['message'] }}">

        <div class="confirm__actions">
            <button type="submit" name="action" value="back" class="btn btn--back">戻る</button>
            <button type="submit" name="action" value="submit" class="btn btn--submit">送信する</button>
        </div>
    </form>

@endsection
