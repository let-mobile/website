@extends('layouts.default')
@section('title')
<title>About Us | Let Mobile</title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop
@section('content')
<div class="container">
        <div class="row mt-3">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="about-wrapper text-center">
                    <h2 class="intro-title">What Makes Us Special</h2>
                    <p class="justify"> Let Mobile is the leading classified portal of Pakistan, providing the best features and functions to our clients related to online selling. Let Mobile is providing non stop availability of cheap and new products to all over pakistan with just a phone call.

Let Mobile is here to provide 24/7 support to our clients related to online marketing. With good knowledge of your product we can sell it as good as it should be. We'll provide clients from all over Pakistan for your top rated products as quick as possible.

Let Mobile is observing that no one provides the best portal for selling online in Pakistan. So we started to provide a best and easy to use portal for our clients across Pakistan.

Let Mobile is here to devliver the best of us to everyone across Pakistan. In order to achieve this, Let Mobile is providing 24 hour support to our clients. Let Mobile is welcoming your feedbacks.</p>
                </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <img class="img-fluid" src="{{ url('public/assets/img/info.webp') }}" alt="">
            </div>
        </div>
    </div>
    <div class="loginBtmSec mb-2">
        <div class="row">
            <div class="col">
                <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                <h4>BACKGROUND</h4>
                <p class="justify">Let Mobile is observing that no one provides the best portal for selling online in Pakistan.So Let Mobile started to provide a best and easyto use portal for our clients across Pakistan.</p>
            </div>
            <div class="col">
                <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                <h4>Seller Satisfation</h4>
                <p class="justify">Let Mobile is here to deliver the best of us to everyone across Pakistan. In order to achieve this, Let Mobile is providing 24 hour support to our clients. Let Mobile is welcoming your feedbacks.</p>
            </div>
            <div class="col">
                <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                <h4>METHODOLOGY</h4>
                <p class="justify">Let Mobile is using the best methods and techniquies to get connected with our clients. Let Mobile is using the latest techniques and technologies to provide the best to our clients without delay.</p>
            </div>
        </div>
    </div>
    <div class="counter">
        <div class="row">
            <div class="col">
                <div class="count-up">
                    <img src="{{ asset('assets/images/brands-icon.png') }}" alt="" />
                    <h3 class="counter-count">116</h3>
                    <p>Brands</p>
                </div>
            </div>
            <div class="col">
                <div class="count-up">
                    <img src="{{ asset('assets/images/seller-icon.png') }}" alt="" />
                    <h3 class="counter-count">5484</h3>
                    <p>Trusted Seller</p>
                </div>
            </div>
            <div class="col">
                <div class="count-up">
                    <img src="{{ asset('assets/images/facebookCount-icon.png') }}" alt="" />
                    <h3 class="counter-count">500</h3>
                    <p>Facebook Fans</p>
                </div>
            </div>

            <div class="col">
                <div class="count-up">
                    <img src="{{ asset('assets/images/map-icon.png') }}" alt="" />
                    <h3 class="counter-count">649</h3>
                    <p>Locations</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
@stop