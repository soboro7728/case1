<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <p class="header__logo">
                Atte
            </p>
        </div>
        <nav class="header__nav">
            <ul class="header-nav-list">
                <li class="header-nav-item"><a class="header-nav-link" href="/">ホーム</a>
                <li class="header-nav-item"><a class="header-nav-link" href="/attendance">日付一覧</a>
                    <!-- ログアウトのリンク -->
                <li class="header-nav-item"><a class="header-nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </ul>

        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer__inner">
            <p class="footer__logo" href="/">
                Atte,inc.
            </p>
        </div>
    </footer>
</body>

</html>