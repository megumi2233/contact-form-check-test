<div class="header">
    <div class="header__inner">
        <h1 class="header__logo">
            <a href="{{ url('/') }}">FashionablyLate</a>
        </h1>
        <nav class="header__nav">
            <ul>
                @guest
                    <li><a href="{{ route('login.form') }}">ログイン</a></li>
                     <li><a href="{{ route('register.form') }}">登録</a></li>
                @else
                    <li><a href="{{ route('inquiry.form') }}">お問い合わせ</a></li>
                    <li><a href="{{ route('admin.dashboard') }}">管理画面</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</div>
