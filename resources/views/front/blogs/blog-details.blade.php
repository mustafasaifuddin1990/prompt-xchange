@extends('front/partials/header')
@section('content')
<section class="blog_banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12" style="background:url({{asset($blog_single->image)}});">
                <div class="banner_cont">
                    <a href="javascript:;">{{ $blog->category->name ?? 'No Category' }}</a>
                    <h2>{{$blog_single->title}}</h2>
                    <div class="date">{{ \Carbon\Carbon::parse($blog_single->publish_date)->format('M d, Y') }} <div class="dura">5 mins read</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog_det_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="blogs_det_cont">
                    <p>{!! $blog_single->content !!}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="blog_det_sidebar">
                    <h3>The Latest</h3>
                    @if($latest_blogs->isEmpty())
                        <p class="no-blog">No latest blogs found.</p>
                    @else
                        @foreach($latest_blogs as  $latest_blog)
                            <div class="blogs_link">
                                <a href="{{route('prompt.blogs_details' ,$latest_blog->slug)}}"><strong>{{$latest_blog->title}}</strong></a>
                                <div class="dur">5 min read</div>
                            </div>
                        @endforeach
                    @endif

                </div>
        </div>
    </div>
    </div>
</section>
<section class="blog_btm blog_det_btm">
    <div class="container-fluid">
        <div class="row" style="background:url('front/assets/img//blogs/btm.png');">
            <div class="col-md-7 col-sm-12">
                <p>FURTHER INFO</p>
                <strong>
                    <a href="javascript:;">
                        <span>www.sebastiankoseda.com</span>
                        <img src="{{asset('front/assets/img/blogs/arrow.png')}}">
                    </a>
                </strong>
            </div>
            <div class="col-md-5 col-sm-12">
                <h6>ABOUT THE AUTHOR</h6>
                <h4>Olivia Hingley</h4>
                <p>Focused on advising companies on long-
                    term strategy, growth plans, and market
                    positioning.</p>
            </div>
        </div>
    </div>
</section>
@endsection
