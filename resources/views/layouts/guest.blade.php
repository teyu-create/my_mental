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
                {{-- ヘッダー --}}
                <header class="bg-body-tertiary">
                  <div class="container">
                            <!-- 以下を追記 
                              {{-- Authentication Links --}} 
                            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                            @guest
                               {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a> --}}
                                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                              @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('messages.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            以上までを追記 -->
                      <a href="{{ url('/') }}">
                         <img alt="サイトロゴ" width=100% src="{{ asset('image/every-mental.png') }}">
                      </a>
                  </div>
                </header>                
                {{-- ここまでヘッダー --}}

                {{-- 編集完了フラッシュメッセージ --}}
                @if(session('success'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div class="text_center">
                            {{ session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                  </div>
                @endif

                <main>
                    {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    <footer class="footer">
        @guest
            {{--未ログインの場合の処理はこの行に記述--}}
         @else {{-- ログインしていたらログアウトボタンを表示 --}}
          <a class="btn btn-outline-light rounded-pill" href="{{ route('logout') }}" role="button" style="border-width:2.5px;font-weight:bold"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
            
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>
        @endguest
    </footer>
</html>