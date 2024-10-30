@php
    $userRole = auth()->check() ? auth()->user()->roles->first()->slug ?? 'guest' : 'guest';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Login | Prompt Xchange' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="icon" href="{{asset('front/assets/img/logo.png')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}




</head>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="/"><img src="{{asset('front/assets/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <a href="javacript:void(0)" id="clos__menu"><i class="fas fa-times"></i></a>

            <ul class="navbar-nav ">

                          <li class="nav-item {{ Request::routeIs('prompt.home')  ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.home') }}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('prompt.explore') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.explore') }}">Explore</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('prompt.hire') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.hire') }}">Hire</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('prompt.blogs') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.blogs') }}">Blogs</a>
                        </li>
                        @if($userRole === 'admin')
                            <li class="nav-item {{ Request::routeIs('admin.prompt.create')  ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.prompt.create') }}">Create</a>
                            </li>
                        @elseif($userRole === 'content_creator')
                            <li class="nav-item {{ Request::routeIs('creator_prompt_create')  ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('creator_prompt_create') }}">Create</a>
                            </li>
                        @else

                        @endif
                <li class="nav-item {{ Request::routeIs('prompt.marketplace')  ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('prompt.marketplace') }}">Marketplace</a>
                </li>
                        <li class="nav-item {{ Request::routeIs('prompt.about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.about') }}">About us</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('prompt.contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prompt.contact') }}">Contact</a>
                        </li>
        </div>
        <div class="right_menu d-flex">
            <form class="form-inline search_form ">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          <ul class="m-0 p-0 d-flex justify-content-end list-unstyled">
    @guest
        <li><a href="{{ route('login') }}" class="trans_btn">Login</a></li>
        <li><a href="javascript:;" class="gradient_btn" data-toggle="modal" data-target="#myModal">Get the app</a></li>
    @endguest

    @auth
        <li class="dropdown">
            <a href="javascript:;" class="trans_btn dropdown-toggle" id="userDropdown">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                @if($userRole === 'admin')
                    <a href="{{ route('admin_dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                @elseif($userRole === 'general_user')
                    <a href="{{ route('user_dashboard') }}" class="dropdown-item">Account Dashboard</a>
                @elseif($userRole === 'content_creator')
                    <a href="{{ route('creator_dashboard') }}" class="dropdown-item">Creator Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                @endif
                <a href="{{ route('logout') }}" class="dropdown-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    @endauth
</ul>

        </div>
    </nav>
</header>
<!-- Modal -->
<div id="myModal" class="modal fade started_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <h4>Join Prompt Xchange</h4>
                <p>We never post or share anything on your social without asking.</p>
                <div class="wht cont"><a href="javascript:;"><i class="fa-solid fa-envelope"></i>Sign up with Email</a></div>
                <div class="red cont"><a href="javascript:;"><i class="fa-brands fa-google"></i>Sign up with Google</a></div>
                <div class="blue cont"><a href="javascript:;"><i class="fa-brands fa-facebook"></i>Sign up with Facebook</a></div>
                <div class="grey cont"><a href="javascript:;"><i class="fa-brands fa-apple"></i>Sign up with Apple</a></div>
                <div class="break">Or</div>
                <div class="already_acc">Already have an account?<a href="#">Login</a></div>
            </div>
        </div>

    </div>
</div>

<body>

    @yield('content')


    @include('front.partials.footer')
