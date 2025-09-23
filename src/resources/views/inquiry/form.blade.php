@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

    <h1 class="form__title">お問い合わせフォーム</h1>

    @if ($errors->any())
        <div class="form__errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('inquiry.confirm') }}" class="form__form">
        @csrf

        <div class="form__group">
            <label for="last_name">姓 <span class="required">*</span></label>
            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                aria-required="true">
            @error('last_name')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="first_name">名 <span class="required">*</span></label>
            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                aria-required="true">
            @error('first_name')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label>性別 <span class="required">*</span></label>
            <div>
                <input type="radio" id="male" name="gender" value="male"
                    {{ old('gender') == 'male' ? 'checked' : '' }} required>
                <label for="male">男性</label>

                <input type="radio" id="female" name="gender" value="female"
                    {{ old('gender') == 'female' ? 'checked' : '' }}>
                <label for="female">女性</label>

                <input type="radio" id="other" name="gender" value="other"
                    {{ old('gender') == 'other' ? 'checked' : '' }}>
                <label for="other">その他</label>
            </div>
            @error('gender')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="email">メールアドレス <span class="required">*</span></label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required aria-required="true">
            @error('email')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="tel">電話番号 <span class="required">*</span></label>
            <input id="tel" type="tel" name="tel" value="{{ old('tel') }}" required aria-required="true"
                inputmode="tel">
            @error('tel')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="address">住所 <span class="required">*</span></label>
            <input id="address" type="text" name="address" value="{{ old('address') }}" required aria-required="true">
            @error('address')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="building">建物名</label>
            <input id="building" type="text" name="building" value="{{ old('building') }}">
            @error('building')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="category_id">お問い合わせの種類 <span class="required">*</span></label>
            <select id="category_id" name="category_id" required aria-required="true">
                <option value="" disabled selected>選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="form__error-message">{{ $message }}</p>
            @enderror
        </div>


        <div class="form__group">
            <label for="message">お問い合わせ内容 <span class="required">*</span></label>
            <textarea id="message" name="message" rows="4" maxlength="120" required aria-required="true">{{ old('message') }}</textarea>
            @error('message')
                <p class="form__error-message">お問い合わせ内容は120文字以内で入力してください</p>
            @enderror
        </div>

        <div class="form__actions">
            <button type="submit" class="btn btn--confirm">確認画面へ</button>
        </div>
    </form>
@endsection
