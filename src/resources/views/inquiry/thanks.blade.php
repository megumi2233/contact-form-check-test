@extends('layouts.app')

@section('title', 'お問い合わせ完了')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

    <div class="thanks">
        <p class="thanks__message">お問い合わせありがとうございました。</p>

        <div class="thanks__actions">
            <a href="{{ route('inquiry.form') }}" class="btn btn--home">HOME</a>
        </div>
    </div>
@endsection
