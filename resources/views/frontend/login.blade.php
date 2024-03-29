@extends('layouts.default')
@section('title')
<title>Sign In | Let Mobile </title>
    <meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
@stop
<style type="text/css">
    .required {
        border-color: red !important;
    }
    .errors
    {
        background: #f8f8f8;
        padding: 20px;
        color: darkred;
        border-radius: 5px;
        display: none
    }
    .success
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        display: none
    }
    .login-btn
    {
        width: 50%
    }
    .notification-style
    {
        background: #03a9f4;
        padding: 20px;
        color: white;
        border-radius: 5px;
        margin: 10px 0;
    }
    .disabled-div {
          pointer-events: none;
          opacity: 0.4;
      }
    .social-p
    {
        display: flex;
        text-align: center;
    }
    .social
    {
        width: 60%;
    }
</style>
@section('content')
<div class="page-header" style="background: url(<?=url('public/assets/img/banner1.webp')?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h1 class="product-title">Login</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home /</a></li>
                        <li class="current">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="login section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-xs-12">
                @if(Session::has('message'))
                    <div class="notification-style">
                       {{ Session::get('message') }}
                    </div>
                @endif
                 @if(Session::has('hasEmail'))
                    <div class="notification-style">
                       {{ Session::get('hasEmail') }}
                    </div>
                @endif
                <div class="login-form login-area" id="mydiv">
                    <h3>Login Now</h3>
                    <form id="loginForm" accept-charset="utf-8" class="login-form">
                        {{ @csrf_field() }}
                        <fieldset class="fieldset">
                            <div class="form-group">
                                <div class="errors alert alert-danger"></div>
                                <div class="success alert alert-success"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-envelope"></i>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="password" id="password" placeholder="Password(At least 6 characters and Integers)" class="form-control"> </div>
                            </div>
                        <div class="form-group mb-3">
                            <div class="text-center">
                                <button type="submit" value="Login" class="btn btn-common log-btn login-btn">Login <i class="fa fa-spinner fa-spin" style="display: none"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <div  class="custom-control custom-checkbox">
                                <a class="forgetpassword"  href="{{ url('user/signup') }}">New to Let Mobile? Sign Up</a>
                            </div>
                            <div  class="custom-control custom-checkbox">
                                <a class="forgetpassword" href="{{ url('user/forget-password') }}">Forget Password?</a>
                            </div>
                        </div>
                        <div class="form-group mb-3 social-p">
                            <a href="{{ url('auth/google') }}">
                              <img src="{{ asset('public/social/googleconnect.png') }}" class="img-responsive social">
                            </a> 
                        </div>
                         <div class="form-group mb-3 social-p">
                            <a href="{{ url('auth/redirect/facebook') }}">
                              <img src="{{ asset('public/social/facebookconnect.png') }}" class="img-responsive social">
                            </a> 
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="counter-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-layers"></i></div>
                    <h2 class="counterUp">116</h2>
                    <p> Brands</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-users"></i></div>
                    <h2 class="counterUp">5487</h2>
                    <p>TRUSTED SELLER</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-facebook"></i></div>
                    <h2 class="counterUp">400</h2>
                    <p>FACEBOOK FANS</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 work-counter-widget">
                <div class="counter">
                    <div class="icon"><i class="lni-map"></i></div>
                    <h2 class="counterUp">649</h2>
                    <p>Locations</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services section-padding">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                    <div class="icon">
                        <i class="lni-book"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">BACKGROUND</a></h3>
                        <p>We are observing that no one provides the best portal for selling online in Pakistan. <br>So we started to provide a best and easy <br> to use portal for our clients across <br> Pakistan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                    <div class="icon">
                        <i class="lni-leaf"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">SELLER SATISFACTION</a></h3>
                        <p>We are here to deliver the best of us to everyone across Pakistan. In order to achieve this, we are providing 24 hour support to our clients. We are welcoming your feedbacks.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12">
                <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                    <div class="icon">
                        <i class="lni-map"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">METHODOLOGY</a></h3>
                        <p>We are using the best methods and techniquies to get connected with our clients. We are using the latest techniques and technologies to provide the best to our clients without delay.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('page-scripts')
<script type="text/javascript">
    $("#loginForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#loginForm :input").map(function() {
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
        $('.log-btn').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/user/authentication") }}',
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
                $("#loginForm :input").map(function() {
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
                //$('#loginForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append(data.message);
                window.setTimeout(function(){window.location.href = "{{ url('/')}}";}, 1000);
            }
        });
    });
//     $('html').bind('input', function() {
//     alert('test');
// });
</script>
@stop