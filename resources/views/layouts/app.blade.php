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

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div style="margin-top: -50px; margin-bottom: -100px;">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/logo.jpg" width="500" height="175">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
{{--<div class="limiter">--}}
{{--    <div class="container-login100">--}}
{{--        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">--}}
{{--            <form class="login100-form validate-form">--}}
{{--					<span class="login100-form-title p-b-55">--}}
{{--						Login--}}
{{--					</span>--}}

{{--                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">--}}
{{--                    <input class="input100" type="text" name="email" placeholder="Email">--}}
{{--                    <span class="focus-input100"></span>--}}
{{--                    <span class="symbol-input100">--}}
{{--							<span class="lnr lnr-envelope"></span>--}}
{{--						</span>--}}
{{--                </div>--}}

{{--                <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">--}}
{{--                    <input class="input100" type="password" name="pass" placeholder="{{ __('login.password') }}">--}}
{{--                    <span class="focus-input100"></span>--}}
{{--                    <span class="symbol-input100">--}}
{{--							<span class="lnr lnr-lock"></span>--}}
{{--						</span>--}}
{{--                </div>--}}

{{--                <div class="contact100-form-checkbox m-l-4">--}}
{{--                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">--}}
{{--                    <label class="label-checkbox100" for="ckb1">--}}
{{--                        Remember me--}}
{{--                    </label>--}}
{{--                </div>--}}

{{--                <div class="container-login100-form-btn p-t-25">--}}
{{--                    <button class="login100-form-btn">--}}
{{--                        Login--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <div class="text-center w-full p-t-42 p-b-22">--}}
{{--						<span class="txt1">--}}
{{--							Or login with--}}
{{--						</span>--}}
{{--                </div>--}}

{{--                <a href="#" class="btn-face m-b-10">--}}
{{--                    <i class="fa fa-facebook-official"></i>--}}
{{--                    Facebook--}}
{{--                </a>--}}

{{--                <a href="#" class="btn-google m-b-10">--}}
{{--                    <img src="images/icons/icon-google.png" alt="GOOGLE">--}}
{{--                    Google--}}
{{--                </a>--}}

{{--                <div class="text-center w-full p-t-115">--}}
{{--						<span class="txt1">--}}
{{--							Not a member?--}}
{{--						</span>--}}

{{--                    <a class="txt1 bo1 hov1" href="#">--}}
{{--                        Sign up now--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>--}}
{{--    <!--===============================================================================================-->--}}
{{--    <script src="vendor/bootstrap/js/popper.js"></script>--}}
{{--    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>--}}
{{--    <!--===============================================================================================-->--}}
{{--    <script src="vendor/select2/select2.min.js"></script>--}}
{{--    <!--===============================================================================================-->--}}
{{--    <script src="js/main.js"></script>--}}
{{--</div>--}}
</body>
</html>
