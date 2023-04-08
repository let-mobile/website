@extends('layouts.default')
@section('title')
<title>Change Password | Let Mobile</title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in Lahore, Karachi, Islamabad, Faisalabad and Multan all over the Pakistan. ">
@stop

@section('content')
<div class="MainLogin">
    <div class="container MainInnserDiv">
        <form action="{{ url('reset-password') }}/{{ $hash ?? '' }}" class="d--flex position-relative" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-5 d-none d-sm-block d-xs-block">
                    <img src="{{ asset('assets/images/logo/let-mobile-logo.svg') }}" alt="google +">
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
                        <label for="Email" class="mb-2">New Password</label>
                        <input type="password" name="password" id="password" placeholder="New Password" required value="{{ old('password') ?? '' }}">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="Email" class="mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm-password" placeholder="Password(Confirm Password)" required value="{{ old('confirm_password') ?? '' }}">
                        @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>
                    <button class="btn-Ads btn-rupees p-2 w-100 fs-5 mt-2 mb-3 align-item-center">Send Email</button>
                    <p class="mb-1">
                        <a href="{{ url('login') }}" class="text-decoration-none frgt-pswrd">Back to Login?</a>
                    </p>
                    <p class="or text-center position-relative"><span>or</span></p>
                    <p class="text-center mt-3">Using Social Networks</p>
                    <ul class="text-center mt-3">
                        <li><a href="{{ url('auth/google') }}"><img src="{{ asset('assets/images/google+-icon.png') }}" alt="google +"></a></li>
                        <li><a href="{{ url('auth/redirect/facebook') }}"><img src="{{ asset('assets/images/facebook-icon.png') }}" alt=""></a></li>
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
        <div class="loginBtmSec mt-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                        <h4>BACKGROUND</h4>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan.So we started to provide a best and easyto use portal for our clients across Pakistan.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
                        <h4>Seller Satisfation</h4>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan.So we started to provide a best and easyto use portal for our clients across Pakistan.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="boxe-style">
                        <p class="Innertop_img"><img src="{{ asset('assets/images/bkgrndBtm-icon.png') }}" alt=""/></p>
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
<script type="text/javascript">
    $("#forgetForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#forgetForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#forgetForm :input").map(function() {
            if (!$(this).val()) {
                $(this).addClass('required');
                errors++;
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        if (errors > 0) { return false; }
        var formData = new FormData($(this)[0]);
        $(".fa-spin").show();
        //$('.log-btn').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/reset-password") }}/{{ $hash }}',
            data: formData,
            cache       : false,
            contentType : false,
            processData : false,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                var x = JSON.parse(data.responseText);
                //console.log(x);
                $('.log-btn').attr('disabled', false);
                $(".errors").text(x.message);
                $(".errors").show();
                $(".fa-spin").hide();
                var errors = 0;
                $("#forgetForm :input").map(function() {
                    if (!$(this).val()) {
                        $(this).addClass('required');
                        errors++;
                    } else if ($(this).val()) {
                        $(this).removeClass('required');
                    }
                });
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $(".fa-spin").hide();
                $('.log-btn').attr('disabled', false);
                console.log(data);
                $('#forgetForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append(data.message);
                window.setTimeout(function(){window.location.href = "{{ url('user/signin')}}";}, 2000);
            }
        });
    });
</script>
@stop
