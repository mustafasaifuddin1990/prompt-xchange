@extends('front/partials/header')
@section('content')
<section class="banner_sec bread_crum" style="background:url('front/assets/img/banner_back.png');">
    <div class="container-fluid" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-md-12 col-sm-12" bis_skin_checked="1">
                <h1 class="text-center"><svg class="svg-inline--fa fa-compass" aria-hidden="true" focusable="false" data-prefix="far" data-icon="compass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M306.7 325.1L162.4 380.6C142.1 388.1 123.9 369 131.4 349.6L186.9 205.3C190.1 196.8 196.8 190.1 205.3 186.9L349.6 131.4C369 123.9 388.1 142.1 380.6 162.4L325.1 306.7C321.9 315.2 315.2 321.9 306.7 325.1V325.1zM255.1 224C238.3 224 223.1 238.3 223.1 256C223.1 273.7 238.3 288 255.1 288C273.7 288 288 273.7 288 256C288 238.3 273.7 224 255.1 224V224zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path></svg><!-- <i class="fa-sharp fa-regular fa-compass"></i> Font Awesome fontawesome.com -->
                    Blogs</h1>
            </div>
        </div>
    </div>
</section>
<section class="blogs_grid_sec">
    <div class="container-fluid">
        <div class="row">
            @if($blogs->isEmpty())
                <p>No blogs available at the moment.</p>
            @else
                @foreach($blogs as $key => $blog)
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_info">
                                <img src="{{ asset($blog->image ? $blog->image : 'front/assets/img/blogs/btm.png') }}">

                                <div class="blog_cont_box">
                                    <div class="tag"><a href="#">{{ $blog->category->name ?? 'No Category' }}</a></div>
                                    <a href="{{ route('prompt.blogs_details', $blog->slug) }}">
                                        <h3>{{ $blog->title }}</h3>
                                    </a>
                                    <div class="date_info d-flex justify-content-between">
                                        <span class="date">{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</span>
                                        <span>5 Mins Read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div class=" col-12 pagination_row">
                    <div class=" blog-paginations">
                        {{ $blogs->onEachSide(5)->links('pagination::bootstrap-5') }}
                    </div>
            </div>
            @endif

    {{--            <div class="col-12">--}}
    {{--                <a href="javascript:;" class="trans_btn">See more articles</a>--}}
    {{--            </div>--}}
        </div>
    </div>
</section>
<section class="blog_btm">
    <div class="container-fluid">
        <div class="row" style="background:url('front/assets/img//blogs/btm.png');">
            <div class="col_cont">
                <h4 class="">Want To Know More?</h4>
                <p class="">Do consectetur proident proident id eiusmod
                    deserunt consequat pariatur ad ex velit do Lorem
                    reprehenderit.</p>
                    <a href="javascript:;" class="icon_btn gradient_btn">Contact us <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="col_img">
                <img src="{{asset('front/assets/img/blogs/bl.png')}}">
            </div>
        </div>
    </div>
</section>
@endsection
