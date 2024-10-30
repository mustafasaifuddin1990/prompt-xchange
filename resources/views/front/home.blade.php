@extends('front/partials/header')

@section('content')
<section class="banner_sec" style="background:url('front/assets/img/banner_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1 class="clr_wht"><span>
                        Creativity Has
                    </span>
                    No Boundaries
                </h1>
                <div class="cont">
                    <img src="{{asset('front/assets/img/banner_p.png')}}">
                    <span class="clr_wht">JOIN OUR COMMUNITY OF 150K+ CREATORS</span>
                </div>
                <div class="btn_row">
                    <a href="" class="gradient_btn icon_btn">Start to create <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="" class="trans_btn">Become a pro</a>
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
<section class="gallery_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" class="active" href="#home">All </a></li>
                    <li><a data-toggle="pill" href="#menu1">Portrait</a></li>
                    <li><a data-toggle="pill" href="#menu2">Landscape</a></li>
                    <li><a data-toggle="pill" href="#menu3">Product</a></li>
                    <li><a data-toggle="pill" href="#menu4">City </a></li>
                    <li><a data-toggle="pill" href="#menu5">Nature</a></li>
                    <li><a data-toggle="pill" href="#menu6">Fashion</a></li>
                    <li><a data-toggle="pill" href="#menu7">Animals </a></li>
                    <li><a data-toggle="pill" href="#menu8">Anime</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active show">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            
               
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu5" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu6" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu7" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu8" class="tab-pane fade">
                        <div class="grid--content">
                            <div class="column--wrapper">
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (1).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (2).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (3).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (4).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (5).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (6).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (7).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (8).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (9).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (10).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (11).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (12).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (13).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (14).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (15).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (16).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (17).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (18).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (19).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (20).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (21).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (22).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (23).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (24).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (25).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (26).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (27).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (28).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (29).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (30).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (31).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (32).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (33).png')}}" alt="Random Image">
                                </div>
                                <div class="post--item">
                                    <img src="{{asset('front/assets/img/gallery (34).png')}}" alt="Random Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lightbox">
                    <div class="title"></div>
                    <div class="filter"></div>
                    <div class="arrowr"></div>
                    <div class="arrowl"></div>
                    <div class="close"></div>
                </div>
                <a href="javascript:;" class="gradient_btn">Load More</a>
            </div>
        </div>
    </div>
</section>
<section class="creator_sec people_caresol_sec">
    <div class="container-fluid pl-5">
        <div class="row">
            <div class="col-12">
                <div class="cont_row d-flex justify-content-between">
                    <h3>Top Creators</h3>
                    <a href="" class="gradient_btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pr-0 ">
                <div class="image_caresol">
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (1).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (2).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (3).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (4).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (5).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (6).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (7).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (8).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (9).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular_sec people_caresol_sec">
    <div class="container-fluid pl-5">
        <div class="row">
            <div class="col-12">
                <div class="cont_row d-flex justify-content-between">
                    <h3>Most Popular</h3>
                    <a href="" class="gradient_btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pr-0 ">
                <div class="image_caresol">
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (1).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/creator (2).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (3).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (4).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (5).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (6).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (7).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (8).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/popular (9).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="selling_sec people_caresol_sec">
    <div class="container-fluid pl-5">
        <div class="row">
            <div class="col-12">
                <div class="cont_row d-flex justify-content-between">
                    <h3>Best Selling</h3>
                    <a href="" class="gradient_btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pr-0 ">
                <div class="image_caresol">
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (1).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (2).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (3).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (4).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (5).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (6).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (7).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (8).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                    <div class="img_box">
                        <img src="{{asset('front/assets/img/selling (9).png')}}">
                        <div class="peop_cont">
                            <strong>John doe</strong>
                            <span>Sed ut perspiciatis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="playground_sec" style="background:url('front/assets/img/playground_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="">AI Digital Playground</h2>
                <p>Creativity thrives in a collaborative environment, and our marketplace fosters a vibrant community of creators, innovators, and visionaries.</p>
                <a href="" class="gradient_btn icon_btn">Learn More<i class="fa-solid fa-arrow-right"></i></a>
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
<section class="category_Sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Categories</h2>
                <p class="text-center">Browse stock photos by category</p>
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
<section class="getstarted_free">
    <div class="container-fluid">
        <div class="row" style="background:url('front/assets/img/stat_back.png');">
            <div class="col-12">
                <h4 class="text-center">Get Started With Prompt Xchange For Free.</h4>
                <p class="text-center">You can become a reader, an author, or both! Join today, cancel anytime, no commitment.</p>
                <div class="btn_row">
                    <a href="" class="icon_btn gradient_btn">Sign up for an account <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="" class="trans_btn">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection