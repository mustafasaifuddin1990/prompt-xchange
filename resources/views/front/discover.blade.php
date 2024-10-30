@extends('front/partials/header')
@section('content')
<section class="banner_sec bread_crum" style="background:url('front/assets/img/banner_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="text-center"><i class="fa-sharp fa-regular fa-compass"></i>Discover</h1>
            </div>
        </div>
    </div>
</section>
<section class="category_Sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-left pl-5">Trending</h3>
            </div>
        </div>
        <div class="cat_row row">
            <div class="col-lg-4">
                <div class="cat_box">
                    <img src="{{asset('front/assets/img/prompt.png')}}">
                    <a href="javascript:;">Prompt</a>
                </div>
                <div class="cat_box small">
                    <img src="{{asset('front/assets/img/stable.png')}}">
                    <a href="javascript:;">Stable Diffusion</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cat_box mid">
                    <img src="{{asset('front/assets/img/midjourney.png')}}">
                    <a href="javascript:;">MidJourney</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cat_box small">
                    <img src="{{asset('front/assets/img/dall.png')}}">
                    <a href="javascript:;">DALL-E</a>
                </div>
                <div class="cat_box">
                    <img src="{{asset('front/assets/img/gemeni.png')}}">
                    <a href="javascript:;">gemeni</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rising_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Rising Stars</h3>
                <div class="rising_telent_row">
                    <div class="star_box">
                        <div class="social_connect">
                            <h6>Connect To Your
                                Social Media.</h6>
                            <div class="cont">
                                <p>Discover Quili writers you already
                                    ollow on social media.</p>
                                <div class="social_list">
                                    <ul class="list-unstyled p-0 m-0 d-flex">
                                        <li><a href="javascript:;"><i class="fa-brands fa-google"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="star_prof">
                            <img src="{{asset('front/assets/img/1.png')}}">
                            <div class="d-flex">
                                <strong>Alexander Hughes</strong>
                                <span><i class="fa-light fa-eye"></i>300k views</span>
                            </div>
                            <p>Award-winning sci-fi writer with a knack for
                                creating futuristic worlds.</p>
                            <a class="icon_btn gradient_btn" href="javascript:;">Visit<i class="fa-solid fa-arrow-right"></i></a>
                            <a href="javascript:;" class="cat_tag"><i class="fa-solid fa-robot"></i>Sci-Fi</a>
                        </div>
                    </div>
                    <div class="star_box">
                        <div class="social_connect">
                            <h6>Connect To Your
                                Social Media.</h6>
                            <div class="cont">
                                <p>Discover Quili writers you already
                                    ollow on social media.</p>
                                <div class="social_list">
                                    <ul class="list-unstyled p-0 m-0 d-flex">
                                        <li><a href="javascript:;"><i class="fa-brands fa-google"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="star_prof">
                            <img src="{{asset('front/assets/img/2.png')}}">
                            <div class="d-flex">
                                <strong>Alexander Hughes</strong>
                                <span><i class="fa-light fa-eye"></i>300k views</span>
                            </div>
                            <p>Award-winning sci-fi writer with a knack for
                                creating futuristic worlds.</p>
                            <a class="icon_btn gradient_btn" href="javascript:;">Visit<i class="fa-solid fa-arrow-right"></i></a>
                            <a href="javascript:;" class="cat_tag"><i class="fa-solid fa-robot"></i>Sci-Fi</a>
                        </div>
                    </div>
                    <div class="star_box">
                        <div class="social_connect">
                            <h6>Connect To Your
                                Social Media.</h6>
                            <div class="cont">
                                <p>Discover Quili writers you already
                                    ollow on social media.</p>
                                <div class="social_list">
                                    <ul class="list-unstyled p-0 m-0 d-flex">
                                        <li><a href="javascript:;"><i class="fa-brands fa-google"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="star_prof">
                            <img src="{{asset('front/assets/img/3.png')}}">
                            <div class="d-flex">
                                <strong>Alexander Hughes</strong>
                                <span><i class="fa-light fa-eye"></i>300k views</span>
                            </div>
                            <p>Award-winning sci-fi writer with a knack for
                                creating futuristic worlds.</p>
                            <a class="icon_btn gradient_btn" href="javascript:;">Visit<i class="fa-solid fa-arrow-right"></i></a>
                            <a href="javascript:;" class="cat_tag"><i class="fa-solid fa-robot"></i>Sci-Fi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="talk_ab_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex">
                    <h3>Most Talked About</h3>
                    <a href="javascript:;" class="gradient_btn">View All</a>
                </div>
                <div class="most_talk d-flex">
                    <a href="javascript:;" class="blue_btn">Conversational A1<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="grey_btn">Anxiety<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="orange_btn">Decentralized Finance<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="red_btn">Creative Nonfiction<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="seagreen_btn">Elder Care<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="orange_btn">Flutter<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="red_btn">Data Engineering<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="seagreen_btn">Terraform<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="blue_btn">Indie Game<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="grey_btn">Freelancincl<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="orange_btn">Venture Capital<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="blue_btn">Deep learning<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="grey_btn">Generative Art<i class="fa-solid fa-arrow-right"></i></a>
                    <a href="javascript:;" class="orange_btn">Book Reviews<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories_sec"  style="background:url('front/assets/img/playground_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex">
                    <h3>Categories</h3>
                    <a href="javascript:;" class="gradient_btn">View All</a>
                </div>
                <div class="cat_btn">
                    <a href="javascript:;">Featured Series<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Technology<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Blockbuster<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Writers' tips<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Fashion & Design<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Travel<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Comedy<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Culture<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Art<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Music<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Business<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Food<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Health and Welness<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Science<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">News<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Sport<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">history<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="javascript:;">Literature<i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection