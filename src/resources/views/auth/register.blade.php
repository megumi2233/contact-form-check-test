@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <h1 class="register__title">ユーザー登録</h1>

    @if ($errors->any())
        <div class="register__errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}" class="register__form">
        @csrf

        <div class="register__group">
            <label for="name">お名前 <span class="required">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p class="register__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__group">
            <label for="email">メールアドレス <span class="required">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="register__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__group">
            <label for="password">パスワード <span class="required">*</span></label>
            <input type="password" name="password" required>
            @error('password')
                <p class="register__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__actions">
            <button type="submit" class="btn btn--register">登録</button>
        </div>
    </form>
@endsection
