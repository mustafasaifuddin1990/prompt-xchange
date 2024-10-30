@extends('front/partials/header')
@section('content')
    <style>
        a.btn-love .small-ornament {
            opacity: 0;
            visibility: hidden;
        }
        span.total_count {
            margin-left: 10px;
        }
        a.btn-love .circle {
            opacity: 0;
            visibility: hidden;
        }

        a.btn-love.act .small-ornament {
            visibility: visible;
        }

        a.btn-love.act .circle {
            visibility: visible;
            z-index: -1;
        }
        a.btn-love.act span.heart {
            font-weight: 600;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent;
        }

        a.btn-love span.heart {
            font-weight: 400;
        }
        span.heart:before {
            content: "\f004";
            font-family: 'Font Awesome 5 Free';
        }
        .profile_banner .profile_cont ul.view_list .btn-love svg {
            margin-right: 0 !important;
        }
        li.like-btn a {
            color: unset;
            text-decoration: none;
        }
        .errors_messages p {
            margin: 0;
            padding-top: 20px;
        }
        body {
            text-align:center;
        }
        .btn-love{
            /*margin:20% auto;*/
            cursor:pointer;
            font-size:24px;
            position:relative;
            .fa {
                position:relative;
                z-index:1;
            }
            .small-ornament {
                width:135px;
                height:135px;
                position:absolute;
                margin-left: -67.5px;
                margin-top: -67.5px;
                left: 50%;
                transform:scale(0);
                top: 50%;
                z-index: -1;
                .ornament {
                    position: absolute;
                    width: 16px;
                    height: 16px;
                    margin-left: -8px;
                    margin-top: -8px;
                    opacity: 0.6;
                    left: 50%;
                    top: 50%;
                    border-radius:8px;
                    transform-origin: 50% 50% 0px;
                    &.o-1{
                        background:#988ADE;
                        transform:translate(-90px,-50px);
                    }
                    &.o-2{
                        background:#DE8AA0;
                        transform:translate(0px,-100px);
                    }
                    &.o-3{
                        background:#8AAEDE;
                        transform:translate(90px,-50px);
                    }
                    &.o-4{
                        background:#8ADEAD;
                        transform:translate(90px,50px);
                    }
                    &.o-5{
                        background:#DEC58A;
                        transform:translate(0px,100px);
                    }
                    &.o-6{
                        background:#8AD1DE;
                        transform:translate(-90px,50px);
                    }
                }
            }
            .circle{
                position: absolute;
                width: 135px;
                height: 135px;
                margin-left: -67.5px;
                margin-top: -67.5px;
                border-radius:50%;
                opacity: 0;
                left: 50%;

                top: 50%;
                transform: translate(0px, 0px) rotate(0deg) scale(0);
                transform-origin: 50% 50% 0px;
            }
        }

    </style>
    <section class="profile_banner">
        <div class="container-fluid">
            <div class="row">
                <div class="profile_cover">
                    <img src="{{asset('front/assets/img/prof_banner.png')}}" alt="">
                </div>
                <div class="profile_cont">
                    <img src="{{asset($profile_picture ?? 'front/assets/img/no-user.jpg')}}" alt="Star">
                    <h3 class="text-center">{{$user}}</h3>
                    <ul class="view_list d-flex p-0">
                        <li class="like-btn">
                            @php
                                if(Auth::check()){
                                    $user_id = Auth()->user()->id;
                                }else{
                                    $user_id = 'NaN';
                                }

                            @endphp
{{--                            <a href="javascript:void(0);" onclick="apply_likes(this)" data-user-id="{{$user_id}}" data-post-id="{{$profile->id}}" data-item-type="profile">--}}
{{--                                <i class="fa-regular fa-heart" ></i>--}}
{{--                                8--}}
{{--                            </a>--}}
                            <a class="btn-love" onclick="apply_likes(this)" data-user-id="{{$user_id}}" data-post-id="{{$profile->id}}" data-item-type="profile">
                                <span class="heart"></span>

                                <div class="small-ornament">
                                    <div class="ornament o-1"></div>
                                    <div class="ornament o-2"></div>
                                    <div class="ornament o-3"></div>
                                    <div class="ornament o-4"></div>
                                    <div class="ornament o-5"></div>
                                    <div class="ornament o-6"></div>
                                </div>
                                <div class="circle">
                                    <svg ><ellipse id="eclipse" rx="50" ry="50" cx="67.5" cy="67.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="transparent" stroke-dasharray="" stroke-opacity="1" stroke-width="0" stroke="#988ADE"></ellipse></svg>
                                </div>
                            </a><span class="total_count">{{$all_count}}</span>
                        </li>
                        <li class="view-btn">
                            <i class="fa-thin fa-eye" ></i>
                            {{$view_profile_count}}
                        </li>
                        <li class="comment-btn">
                            <i class="fa-solid fa-message" ></i>
                           14k
                        </li>
                        <li>
                            <i class="fa-solid fa-user-group" ></i>
                            1.2M Followers
                        </li>
                    </ul>
                    <div class="loadermain">
                        <button id="hireButton" style="color:#fff; border:none;"  class="gradient_btn icon_btn" onclick="hireContentCreator({{ $profile->id }})">Hire Me   <i class="fa-solid fa-arrow-right"></i></button>
                        <div id="loader" class="loader"></div>
                    </div>
    {{--                    <a href="javascript:void(0);" class="gradient_btn icon_btn" onclick="hireContentCreator({{ $profile->id }})">Hire Me <i class="fa-solid fa-arrow-right"></i></a>--}}

                        <div style="display: none;" class="hiring_message">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery_sec profile_feeds">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" class="active" href="#Trending">Trending </a></li>
                        <li><a data-toggle="pill" href="#Collections">Collections </a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="Trending" class="tab-pane fade in active show">
                            <div class=" ">
                             <div class="feed_row row">
    @if($promptGenerations->isEmpty())
        <div class="no-prompts-message text-center">
            <p style="  background: linear-gradient(90deg, #1C2DB0, #CB48D8);
    padding: 10px;
    border-radius: 10px;" class="text-center">No prompts available at the moment.</p>
        </div>
    @else
        @foreach($promptGenerations as $promptGeneration)
            <div class="prof_feed_item">
                <div class="image_wrapper">
                    @if($promptGeneration->generatedImages->isNotEmpty())
                        <img src="{{ $promptGeneration->generatedImages->first()->image_url }}" alt="Generated Image">
                    @else
                        <img src="/path/to/default-image.jpg" alt="No Image Available">
                    @endif
                    <div class="overlay">
                        <strong>{{ $promptGeneration->positive_prompt }}</strong>
                    </div>
                </div>
                <div class="prof_feed_cont d-flex">
                    <strong>{{ $promptGeneration->positive_prompt }}</strong>
                    <a href="{{ route('prompt.generation_single', $promptGeneration->id) }}"><i class="fa-solid fa-plus"></i></a>
                </div>
            </div>
        @endforeach
    @endif
</div>



                            </div>
                        </div>
                        <div id="Collections" class="tab-pane fade in ">
                            <div class=" ">
                                <div class="feed_row row">
                                    @foreach($promptCategories as $promptCategory)
                                    <div class="prof_feed_item">
                                        <img src="{{ asset('front/assets/img/blogs/btm.png') }}" alt="Random Image">
                                        <div class="prof_feed_cont d-flex">
                                            <strong>{{ $promptCategory->category_name }}</strong>
                                            <a href="javascript:;"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" class="trans_btn">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script>



        const heart_btn = () => {
            const btnLove = document.querySelector('.btn-love');
            if (!btnLove.classList.contains('act')) {
                btnLove.className += " act";

                TweenMax.set('.circle, .small-ornament', {
                    rotation: 0,
                    scale: 0,
                });
                TweenMax.set('.ornament', {
                    opacity: 0,
                    scale: 1,
                });

                let Tl = new TimelineMax({});
                Tl.to('.heart', 0.2, {  // Increased duration
                    scale: 0,
                    ease: Back.easeNone,
                });

                Tl.to('.circle', 0.4, {  // Increased duration
                    scale: 1.2,
                    opacity: 1,
                    ease: Back.easeNone,
                });

                Tl.to('.heart', 0.3, {  // Increased duration
                    delay: 0.2,
                    scale: 1.3,
                    // color: '#e3274d',
                    background: '-webkit-linear-gradient(90deg, #1C2DB0, #CB48D8)',
                    ease: Power2.easeOut  // Changed easing for smoother effect
                });
                Tl.to('.heart', 0.3, {  // Increased duration
                    scale: 1,
                    ease: Power2.easeOut
                });

                Tl = new TimelineMax({
                    delay: 0.2,  // Increased delay
                });

                Tl.to('#eclipse', 0.4, {  // Increased duration
                    strokeWidth: 10,
                    ease: Back.easeNone,
                });
                Tl.to('#eclipse', 0.4, {  // Increased duration
                    strokeWidth: 0,
                    ease: Back.easeNone,
                });

                Tl = new TimelineMax({
                    delay: 0.2,  // Increased delay
                });
                Tl.to('.small-ornament', 0.4, {  // Increased duration
                    scale: 0.8,
                    opacity: 1,
                    ease: Linear.easeOut,
                });
                Tl.to('.small-ornament', 0.3, {  // Increased duration
                    scale: 1.2,
                    opacity: 1,
                    rotation: 15,
                    ease: Power2.easeOut  // Changed easing for smoother effect
                });

                Tl = new TimelineMax({
                    delay: 0.4,  // Increased delay
                });
                Tl.to('.ornament', 0.3, {  // Increased duration
                    opacity: 1,
                    ease: Power2.easeNone
                });
                Tl.to('.ornament', 0.2, {  // Increased duration
                    scale: 0,
                    ease: Power2.easeOut
                });
            } else {
                btnLove.classList.remove('act');
                TweenMax.set('.heart', {
                    color: '#c0c1c3',
                    background:'none'
                });
            }
        }

        const apply_likes = async (likes) => {
            const user_id  = likes.dataset.userId;
            const post_id  = likes.dataset.postId;
            const item_type  = likes.dataset.itemType;
            const heart = document.querySelector('.like-btn .total_count');
            let currentLikes = parseInt(heart.innerHTML, 10) || 0;

            const payload = {
                'user_id': user_id,
                "post_id":post_id,
                "item_type": item_type
            };
            const errors_messages = document.querySelector('.errors_messages p');

            try{
                const response  = await axios.post('{{route('profile.like')}}', payload);

                if(response.data.liked === 'disheart' || response.data.liked === 'heart'){
                    heart_btn();
                }

                if(response.data.liked === 'disheart'){
                    currentLikes -= 1;
                }else if(response.data.liked === 'heart'){
                    currentLikes += 1;
                }
                heart.innerHTML = currentLikes;

            }catch (error){
                errors_messages.innerHTML = "Please Login To Continue!!!";
            }


        }

        @if(Auth::check())
        @if($get_liked_details)
        @if($get_liked_details->liked === "heart")
        heart_btn();
        @endif
        @endif
        @endif
    </script>

    <script>
        function hireContentCreator(creatorId) {
            // Show loader and disable button
            $('#loader').show();
            $('#hireButton').prop('disabled', true);

            $.ajax({
                url: "{{ route('hire_Creator') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    content_creator_id: creatorId
                },
                success: function(response) {
                    // Hide loader and enable button
                    $('#loader').hide();
                    $('#hireButton').prop('disabled', false);

                    // Clear any previous messages
                    $('.hiring_message').hide();
                    if (response.success) {
                        $('.hiring_message').text(response.message).addClass('success').show();
                    } else {
                        $('.hiring_message').text(response.message).addClass('error').show();
                    }
                },
                error: function() {
                    $('#loader').hide();
                    $('#hireButton').prop('disabled', false);
                    $('.hiring_message').text('An error occurred. Please try again later.').addClass('error').show();
                }
            });
        }



    </script>

@endsection
