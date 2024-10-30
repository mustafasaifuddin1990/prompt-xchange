@extends('front/partials/header')
@section('content')
    <section class="hire_sec">
        <div class="container-fluid">
            <div class="row row_1">
                <div class="col-sm-12">
                    <h5><i class="fa-solid fa-users"></i>Hire</h5>
                </div>
            </div>
            <div class="row row_2">
                @if($creators->isEmpty())
                    <div class="col-12">
                        <p class="no-creators">No creators found.</p>
                    </div>
                @else
                    @foreach($creators as $creator)

                        <div class="col-md-3 col-sm-12">
                            <div class="hire_box">
                                <a href="{{ route('prompt.profile', $creator->user_slug) }}">
                                    <img src="{{ asset($creator->user_picture ?? 'front/assets/img/no-user.jpg') }}" alt="{{ $creator->name }}">
                                </a>
                                <ul class="view_list d-flex p-0">
                                    <li><i class="fa-regular fa-heart"></i>{{ $creator->heart_likes_count }}</li>
                                    <li><i class="fa-thin fa-eye"></i>{{ number_format($creator->views_count) }}</li>
                                    <li><i class="fa-solid fa-user-group"></i>{{ number_format($creator->followers_count) }}</li>
                                </ul>
                                <a href="{{ route('prompt.profile', $creator->user_slug) }}">
                                    <h3>{{ $creator->name }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-md-12 btn_col">

                    <a href="{{route('login')}}" class="trans_btn">Login</a>
                </div>
            </div>
        </div>
    </section>
@endsection
