@extends('front/partials/header')

@section('content')
<section class="banner_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
</section>
<section class="playground_sec contact_sec" style="background:url('front/assets/img/playground_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="icon_list">
                    <ul>
                        <li><i class="fa-solid fa-phone"></i><a href="javascript:;">+00 123 456 789</a></li>
                        <li><i class="fa-solid fa-envelope"></i><a href="mailto:support@promptxchange.io">support@promptxchange.io</a></li>
                        <!--<li><i class="fa-solid fa-location-dot"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>-->
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2 class="">Contact Us</h2>
                <!--<p class="w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>-->
                <div class="form_div">
                    <form>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter your Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Enter subject" required>
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="gradient_btn submit_btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection