@extends('backend/partials/header')
@section('content')

<section class="dashboard_secs acc_sec">
    <div class="row">
        <div class="col-md-12">
            <div class="head_title d-flex">
                <img src="{{asset('backend/assets/img/square.png')}}" alt="">
                <h3>Account Setting</h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="black_sec m_sec">
                <h4>M Plan</h4>
                <ul>
                    <li>
                        <div class="left">
                            <i class="fa-sharp fa-light fa-cube"></i>
                            <div class="cont">
                                <span>Pro Plan</span>
                                <strong>$4.99</strong>
                            </div>
                        </div>
                        <div class="right">
                            <div class="cont">
                                <span>Payment Due Date</span>
                                <strong>March 31, 2024</strong>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="left">
                            <i class="fa-sharp fa-light fa-cube"></i>
                            <div class="cont">
                                <span>Billing Preference: AUTO Pay</span>
                                <span>Credit Card Info</span>
                            </div>
                        </div>
                        <div class="right">
                            <a href="javascript:;"><i class="fa-solid fa-arrow-up"></i>Change</a>
                            <a href="javascript:;"><i class="fa-solid fa-arrow-up"></i>Add | Update</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="black_sec billing_sec">
                <h4>Billing History</h4>
                <ul>
                    @for ($i=0;$i<=5;$i++) <li>
                        <div class="left">
                            <span>Date: <br>
                                Feb 28, 2024</span>
                        </div>
                        <div class="right">
                            <p>Total: $4.99<br>
                                Pro Plan (monthly)</p>
                        </div>
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
        <div class="col-md-12">
        <div class="black_sec btn_sec">
            <a href="javascript:;" class="gradient_btn"> <i class="fa-sharp fa-light fa-cube"></i>Cancel Subscription</a>
        </div>
        </div>

    </div>
</section>

@endsection