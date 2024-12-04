<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">

            <div id="app">
                {{-- 画面上部に表示するナビゲーションバーです。 --}}
                <nav class="navbar bg-body-tertiary">
                  <div class="container">
                      <a class="navbar-brand" href="http://127.0.0.1:8080">
                         <img alt="まいにちのメンタルロゴ" width="800" src="{{ asset('image/まいにちのメンタル.png') }}">
                      </a>
                  </div>
                </nav>                
                {{-- ここまでナビゲーションバー --}}
                <main class="py-4">
                    {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    <footer class="footer">
      <h5>フッター</h5>
    </footer>
</html>