@extends('front/partials/header')
@section('content')
<!-- <section class="banner_sec"></section> -->
<section class="pricing_sec" style="background:url('front/assets/img/banner_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="left_cont">
                    <strong>WELCOME TO Prompt Xchange!</strong>
                    <h5>Select Your Subscription Plan</h5>
                    <div class="pricing_acc">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                                        Can I switch between different subscription plans?
                                        <div class="icon">
                                            <i class="fa-solid fa-plus"></i>
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes, our platform provides the flexibility for users to switch between
                                        different subscription plan.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                        How do I cancel my subscription if I am not interested anymore?
                                        <div class="icon">
                                            <i class="fa-solid fa-plus"></i>
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        Lorem ipsum..
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                        Can I get refund after cancelling subscription?
                                        <div class="icon">
                                            <i class="fa-solid fa-plus"></i>
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        Lorem ipsum..
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 pricing_col">
                <div class="pricing_cont">
                    @foreach($subscriptions as $key => $subscription)
                        <div class="price_div">
                            <div>
                                <input id="radio-{{ $key }}" class="radio-custom" name="subscription" type="radio" value="{{ $subscription->id }}">
                                <label for="radio-{{ $key }}" class="radio-custom-label">
                                    <strong>{{ $subscription->name }}<span>$ {{ $subscription->price }}<small>/month</small></span></strong>
                                    <ul>
                                        @foreach ($subscription->features as $feature)
                                            <li><i class="fa-solid fa-check fa-fw"></i>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </label>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
