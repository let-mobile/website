@extends('layouts.default')
@section('title')
    <title>Sign Up - Let Mobile </title>
    <meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
@stop
@section('content')
<div class="MainLogin">
    <div class="container MainInnserDiv">
        <form action="register" class="d--flex position-relative" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-5 d-none d-sm-block d-xs-block">
                    <img src="{{ asset('public/assets/images/logo/let-mobile-logo.svg') }}" alt="google +">
                    <p class="text-black m-0">Already have account?</p>
                    <a href="{{ url('login') }}" class="fw-bold">Login</a>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 p-4">
                    <h3 class="text-center mb-2">Create an account</h3>
                    <p class="text-center mt-2">Using Social Networks</p>
                    <ul class="text-center mt-1">
                        <li><a href="{{ url('auth/google') }}"><img src="{{ asset('public/assets/images/google+-icon.png') }}" alt="google +"></a></li>
                        <li><a href="{{ url('auth/redirect/facebook') }}"><img src="{{ asset('public/assets/images/facebook-icon.png') }}" alt=""></a></li>
                    </ul>
                    <p class="or text-center position-relative mt-4"><span>or</span></p>
                    <div class="mb-2">
                        <label for="name" class="mb-2">Name</label>
                        <input type="text" name="name" placeholder="Enter your name.." value="{{old('name') ?? ''  }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="Email" class="mb-2">Email</label>
                        <input type="email" name="email" placeholder="test@gmail.com" value="{{old('email') ?? ''  }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="Mobile Number" class="mb-2">Mobile Number</label>
                        <input type="text" name="phone" placeholder="0xxxxxxxxx" value="{{old('phone') ?? ''  }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="Password" class="mb-2">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" value="{{old('password') ?? ''  }}">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <span class="pswrd_Detail d-none d-sm-block d-xs-block">Password must be min. 6 characters. Combine numbers, upper and lowercase letters.</span>
                    <button class="btn-Ads btn-rupees p-3 w-100 fs-5 mt-2 mb-5 align-item-center">Signup</button>
                    <div class="mt-2 text-center ">
                        <p class="text-black m-0">Already have account?</p>
                        <a href="{{ url('login') }}" class="fw-bold">Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('page-scripts')
@stop
