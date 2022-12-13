@extends('layouts.default')
@section('title')
<title>Forget Password| Let Mobile | Used and New Mobile Phones Sell and Buy in all Pakistan </title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop

@section('content')
<div class="MainLogin">
    <div class="container MainInnserDiv">
        <form action="forget" class="d--flex position-relative" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-5 d-none d-sm-block d-xs-block">
                    <img src="{{ asset('public/assets/images/logo/let-mobile-logo.svg') }}" alt="google +">
                    <p class="text-black m-0">New to Let Mobile?</p>
                    <a href="{{ url('signup') }}" class="fw-bold">Register</a>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 p-4">
                    <h3 class="text-center mb-2">Login to Let Mobile</h3>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {!! session('message') !!}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {!! session('error') !!}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {!! session('warning') !!}
                        </div>
                    @endif
                    <div class="mb-2">
                        <label for="Email" class="mb-2">Email or Phone</label>
                        <input type="email" name="email" id="email" placeholder="Email or phone" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button class="btn-Ads btn-rupees p-2 w-100 fs-5 mt-2 mb-3 align-item-center">Send Email</button>
                    <p class="mb-1">
                        <a href="{{ url('login') }}" class="text-decoration-none frgt-pswrd">Back to Login?</a>
                    </p>
                    <p class="or text-center position-relative"><span>or</span></p>
                    <p class="text-center mt-3">Using Social Networks</p>
                    <ul class="text-center mt-3">
                        <li><a href="{{ url('auth/google') }}"><img src="{{ asset('public/assets/images/google+-icon.png') }}" alt="google +"></a></li>
                        <li><a href="{{ url('auth/redirect/facebook') }}"><img src="{{ asset('public/assets/images/facebook-icon.png') }}" alt=""></a></li>
                    </ul>
                    <div class="mt-2 text-center d-sm-none d-md-none d-xl-none d-lg-none d-xl-none">
                        <p class="text-black m-0">New to Let Mobile?</p>
                        <a href="{{ url('signup') }}" class="fw-bold">Register</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="counter pb-5">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('public/assets/images/brands-icon.png') }}" alt="" />
                        <h3 class="counter-count">116</h3>
                        <p>Brands</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('public/assets/images/seller-icon.png') }}" alt="" />
                        <h3 class="counter-count">5484</h3>
                        <p>Trusted Seller</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('public/assets/images/facebookCount-icon.png') }}" alt="" />
                        <h3 class="counter-count">400</h3>
                        <p>Facebook Fans</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('public/assets/images/map-icon.png') }}" alt="" />
                        <h3 class="counter-count">649</h3>
                        <p>Locations</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="loginBtmSec mt-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('public/assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                        <h4>BACKGROUND</h4>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan.So we started to provide a best and easyto use portal for our clients across Pakistan.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('public/assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                        <h4>Seller Satisfation</h4>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan.So we started to provide a best and easyto use portal for our clients across Pakistan.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('public/assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                        <h4>METHODOLOGY</h4>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan.So we started to provide a best and easyto use portal for our clients across Pakistan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-scripts')

@stop
