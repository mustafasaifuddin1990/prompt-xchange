@extends('front/partials/header')

@section('content')
<section class="banner_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>About Us</h1>
            </div>
        </div>
    </div>
</section>
<section class="playground_sec about_sec" style="background:url('front/assets/img/playground_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="">About AI Digital Playground</h2>
                <p class="w-100">Creativity thrives in a collaborative environment, and our marketplace fosters a vibrant community of creators, innovators, and visionaries.Creativity thrives in a collaborative environment, and our marketplace fosters a vibrant community of creators, innovators, and visionaries.Creativity thrives in a collaborative environment, and our marketplace fosters a vibrant community of creators, innovators, and visionaries.Creativity thrives in a collaborative environment, and our marketplace fosters a vibrant community of creators, innovators, and visionaries.</p>
                <!-- <a href="" class="gradient_btn icon_btn">Learn More<i class="fa-solid fa-arrow-right"></i></a> -->
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="icon_list">
                    <ul>
                        <li><img src="{{asset('front/assets/img/info.png')}}">Connect with Artist and & AI enthusiast</li>
                        <li><img src="{{asset('front/assets/img/info.png')}}">Collaborate with Brands & Get Hired</li>
                        <li><img src="{{asset('front/assets/img/info.png')}}">Become a Gen AI Expert</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection