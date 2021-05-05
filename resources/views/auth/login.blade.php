@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-55">
						{{ __('login.login_name') }}
					</span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        {{--                <input class="input100" type="text" name="email" placeholder="Email">--}}
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" required autocomplete="current-password">
                        {{--                <input class="input100" type="password" name="pass" placeholder="{{ __('login.password') }}">--}}
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    </div>

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            {{ __('login.remember_my') }}
                        </label>
                    </div>

                    <div class="container-login100-form-btn p-t-25">
                        <button type="submit" class="login100-form-btn">
                            {{ __('login.log_in') }}
                        </button>
                    </div>

                    <div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or login with
						</span>
                    </div>

                    <a href="#" class="btn-face m-b-10">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a>

                    <a href="#" class="btn-google m-b-10">
                        <img src="images/icons/icon-google.png" alt="GOOGLE">
                        Google
                    </a>

                    <div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

                        <a class="txt1 bo1 hov1" href="#">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
