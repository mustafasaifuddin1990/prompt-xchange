@extends('front/partials/header')
@section('content')
    <section class="login_sec" style="background:url('front/assets/img/banner_back.png');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 form_col">
                    <h1 class="clr_wht text-center"><span>
                        Login
                    </h1>
                    <p class="text-center line_after">Welcome back! Please enter your details.</p>
                    <div class="login_form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label for="email">{{ __('Email Address') }}</label><br>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="password">{{ __('Password') }}</label><br>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="forget_pass">
                                <div class="remem">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <!--<div class="for"> @if (Route::has('password.request'))-->
                                <!--        <a class="btn btn-link" href="{{ route('password.request') }}">-->
                                <!--            {{ __('Forgot Your Password?') }}-->
                                <!--        </a>-->
                                <!--    @endif</div>-->
                            </div>

                            <button type="submit" class="gradient_btn ">{{ __('Login') }}</button>
                        </form>
                        <div class="dont_account">
                            Don't have an account? <a href="{{route('register')}}">Sign up</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="robo text-center">
                        <img src="{{asset('front/assets/img/banner_robo.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
