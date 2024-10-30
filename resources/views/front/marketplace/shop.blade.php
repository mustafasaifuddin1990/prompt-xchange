@extends('front/partials/header')
@section('content')
    <style>
        .prof_feed_item .item_info img {
            width: 60px;
            height: 60px;
            border-radius: 100%;
            border: 2px solid #6D39C2;
            margin: 0;
        }
        .prof_feed_item .item_info {
            align-items: center;
        }
        .prof_feed_item .item_info  h6 {
            font-size: 20px;
            margin-left: 10px;
            font-weight: 500;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
    <section class="banner_sec bread_crum" style="background:url('front/assets/img/banner_back.png');">
        <div class="container-fluid" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-md-12 col-sm-12" bis_skin_checked="1">
                    <h1 class="text-center"><svg class="svg-inline--fa fa-compass" aria-hidden="true" focusable="false" data-prefix="far" data-icon="compass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M306.7 325.1L162.4 380.6C142.1 388.1 123.9 369 131.4 349.6L186.9 205.3C190.1 196.8 196.8 190.1 205.3 186.9L349.6 131.4C369 123.9 388.1 142.1 380.6 162.4L325.1 306.7C321.9 315.2 315.2 321.9 306.7 325.1V325.1zM255.1 224C238.3 224 223.1 238.3 223.1 256C223.1 273.7 238.3 288 255.1 288C273.7 288 288 273.7 288 256C288 238.3 273.7 224 255.1 224V224zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path></svg><!-- <i class="fa-sharp fa-regular fa-compass"></i> Font Awesome fontawesome.com -->
                        Shop</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="blogs_grid_sec profile_feeds">
        <div class="container-fluid">
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
                                <div class="item_info d-flex">
                                    <img src="{{asset($promptGeneration->user->user_picture)}}">
                                     <h6>{{$promptGeneration->user->name}}</h6>
                                    </div>
                                    <a href="{{ route('prompt.generation_single', $promptGeneration->id) }}"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>
@endsection
