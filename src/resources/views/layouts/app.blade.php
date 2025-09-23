<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FashionablyLate')</title>
   　<link rel="stylesheet" href="{{ asset('css/　reset.css') }}">
　　　<link rel="stylesheet" href="{{ asset('css/　　　style.css') }}">
　　　<link rel="stylesheet" href="{{ asset('css/　　　admin.css') }}">
</head>
<body>
    {{-- ヘッダー --}}
    <header>
        @include('partials.header')
    </header>

    {{-- ページごとの中身 --}}
    <main>
        @yield('content')
    </main>

    {{-- フッター --}}
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
