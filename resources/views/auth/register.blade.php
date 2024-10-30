@extends('front/partials/header')

@section('content')
    <section class="login_sec register_sec" style="background:url('front/assets/img/banner_back.png');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 form_col">
                    <h1 class="clr_wht text-center"><span>
                        Sign Up
                    </h1>
                    <p class="text-center line_after">Welcome ! Please enter your details.</p>
                    <div class="login_form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="User_name">{{ __('Name') }}</label><br>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="email">{{ __('Email Address') }}</label><br>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="password">{{ __('Password') }}</label><br>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="confirm_password">{{ __('Confirm Password') }}</label><br>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                            </div>
                            <label for="role">Select your role:</label>
                            <select id="role" name="role" required>
                                @foreach(App\Models\Role::where('name', '!=', 'Admin')->get() as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select><br><br>
                            <button type="submit" class="gradient_btn ">{{ __('Register') }}</button>
                        </form>
                        <div class="dont_account">
                            Already have an account? <a href="{{route('login')}}">Sign In</a>
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
