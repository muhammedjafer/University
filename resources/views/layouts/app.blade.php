<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: "NRT-Reg";
            src: url("NRT-Reg.eot");
            /* IE9 Compat Modes */
            src: url("NRT-Reg.eot?#iefix") format("embedded-opentype"),
                /* IE6-IE8 */
                url("NRT-Reg.ttf") format("truetype"),
                /* Safari, Android, iOS */
                url("NRT-Reg.woff") format("woff");
            /* Modern Browsers */
            font-weight: normal;
            font-style: normal;
        }

        .span {
            font-family: 'NRT-Reg';
            letter-spacing: 2px;
        }

        body {
            background-color: rgb(40, 40, 40);
        }

        .contai {
            animation: transitionIn 800ms;
        }

        @keyframes transitionIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0px);
            }
        }

        #hhh a span {
            transition: all 0.3s;
        }

        #hhh a span:hover {
            color: rgb(160, 157, 157);
        }

        #mj {
            transition: all 0.3s;
        }

        #mj:hover {
            color: rgb(160, 157, 157);
        }

    </style>
</head>

<body class="contai">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="span" id="mj">پەڕەی سەرەکی</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="transition: all 0.4s">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" dir="rtl" style="padding: 0.6rem;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" id="hhh">
                                    <a class="nav-link" href="{{ route('login') }}"><span class="span">داخل بوون</span></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" id="hhh">
                                    <a class="nav-link" href="{{ route('register') }}"><span class="span">تۆمارکردن</span></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <span class="span">چوونەدەرەوە</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" class="contai">
            @yield('content')
        </main>
    </div>
</body>

</html>
