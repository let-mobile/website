@extends('layouts.default')
@section('title')
<title>Sign In - Let Mobile </title>
    <meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
@stop
@section('content')
<div class="MainLogin">
    <div class="container MainInnserDiv">
        <form action="{{ url('authentication') }}" class="d--flex position-relative" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-5 d-none d-sm-block d-xs-block">
                    <img src="{{ asset('assets/images/logo/let-mobile-logo.svg') }}" alt="google +">
                    <p class="text-black m-0">New to Let Mobile?</p>
                    <a href="{{ url('register') }}" class="fw-bold">Register</a>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 p-4">
                    <h3 class="text-center mb-2">Login to Let Mobile</h3>
                    <p class="text-center mt-2">Using Social Networks</p>
                    <ul class="text-center mt-1">
                        <li><a href="{{ url('auth/google') }}"><img src="{{ asset('assets/images/google+-icon.png') }}" alt="google +"></a></li>
                        <li><a href="{{ url('auth/redirect/facebook') }}"><img src="{{ asset('assets/images/facebook-icon.png') }}" alt=""></a></li>
                    </ul>
                    <p class="or text-center position-relative mt-4"><span>or</span></p>
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mb-2">
                        <label for="Email" class="mb-2">Email or Phone</label>
                        <input type="email" name="email" id="email" placeholder="Email or phone" value="{{old('email') ?? ''  }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="Password" class="mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" value="{{old('password') ?? ''  }}" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button class="btn-Ads btn-rupees p-2 w-100 fs-5 mt-2 mb-3 align-item-center">Login</button>
                    <p class="mb-1">
                        <a href="{{ url('forget-password') }}" class="text-decoration-none frgt-pswrd">Forgot Password?</a>
                    </p>
                    <div class="mt-2 text-center ">
                        <p class="text-black m-0">New to Let Mobile?</p>
                        <a href="{{ url('register') }}" class="fw-bold">Register</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="counter pb-5">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('assets/images/brands-icon.png') }}" alt="" />
                        <h3 class="counter-count">116</h3>
                        <p>Brands</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('assets/images/seller-icon.png') }}" alt="" />
                        <h3 class="counter-count">5484</h3>
                        <p>Trusted Seller</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('assets/images/facebookCount-icon.png') }}" alt="" />
                        <h3 class="counter-count">400</h3>
                        <p>Facebook Fans</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="count-up">
                        <img src="{{ asset('assets/images/map-icon.png') }}" alt="" />
                        <h3 class="counter-count">649</h3>
                        <p>Locations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
