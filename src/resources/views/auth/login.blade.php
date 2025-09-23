@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <h1 class="login__title">ログイン</h1>

    <form method="POST" action="{{ route('login.submit') }}" class="login__form">
        @csrf

        <div class="login__group">
            <label for="email">メールアドレス <span class="required">*</span></label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required aria-required="true">
            @error('email')
                <p class="login__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="login__group">
            <label for="password">パスワード <span class="required">*</span></label>
            <input id="password" type="password" name="password" required aria-required="true">
            @error('password')
                <p class="login__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="login__actions">
            <button type="submit" class="btn btn--login">ログイン</button>
        </div>
    </form>
@endsection
