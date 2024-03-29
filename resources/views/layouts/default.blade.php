<?php $url = $_SERVER['REQUEST_URI']; ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" rel="stylesheet" type="text/css" href="{{ url('/') }}/public/let.webp" />
    @yield('title')
    <meta name="keywords" content="letmobile, let mobile, let mobile pk,letmobilepk,Used mobiles in Pakistan, cheap phones for sale, mobile for sale,Apple, Mobiles,Phones, Samsung, Oppo,Huawei,Sony,oneplus 3t, apple iPhone, Apple store, Samsung Galaxy, Galaxy, Samsung Galaxy note, note 4, oppo mobile, oppo mobile price, Huawei mobile, Huawei mobile price, mi mobile,redmi, xiaomi mobile,Nokia mobile, Nokia mobile price,lahore mobile,old mobile phones,old mobile phones for sale in pakistan, used mobile price, used mobile for sale,used mobiles in lahore,let mobile price,let mobile phone price,nokia old mobiles in pakistan,old mobiles price in pakistan,old mobile phones in pakistan,old mobile phones in pakistan for sale,samsung old mobile in pakistan,old mobiles for sale in pakistan,old mobile phone price in pakistan,old mobile online shopping in pakistan,samsung old mobiles price in pakistan,nokia old mobiles price in pakistan,nokia old mobiles sale in pakistan,nokia old mobiles online shopping in pakistan,all nokia old mobiles price in pakistan,nokia old mobiles buy online in pakistan,sony ericsson old mobiles prices in pakistan,sony ericsson old mobiles online shopping in pakistan,old nokia mobiles for sale in pakistan,old mobile buy online pakistan,nokia old phones in pakistan,nokia old phones price in pakistan,nokia old phones for sale in pakistan,nokia old phones buy online in pakistan,buy old nokia phones in pakistan">
    <meta name="google-site-verification" content="p93-zyLoNzjcH66fqyun-TzNWeJMDuGrdSIUDui6tBE" />
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="canonical" href="{{ request()->fullUrl() ?? '' }}" />
    <meta name="p:domain_verify" content="e68e40ef3edb99a95d5bbe9ab22b8dc6"/>
    <meta name="yandex-verification" content="28408926eb06f820" />
    @if(!isset($item['adslug']) && !isset($blog->blog_id))
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ url('/') }}/public/let-mobile.webp" />
    <meta property="og:image:secure_url" content="{{ url('/') }}/public/let-mobile.webp" />
    <meta property="og:image:type" content="image/webp" />
    <meta property="og:image:alt" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan." />
    @endif
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/fonts/line-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144102274-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144102274-1');
    </script>
    <style type="text/css">
        .slicknav_brand a img
        {
            width: 160px;
            margin: 13px 0px 0px 0px;
            cursor: pointer;
        }
        .hidden-sharer
        {
            opacity: 0;
            position: fixed;
            left: -100%;
            z-index: -10000;
            visibility: hidden;
        }
        .img-width-100
        {
            width: 100%;
        }
        .login--btn {
            position: absolute;
            top: 16px;
            display: none;
            right: 75px;
            color: #03a9f4 !important;    
            font-weight: bold;
        }
        .m-f-1
            {
                margin: 2rem 0rem;
            }
        @media (max-width: 767px)
        {
            .login--btn
            {
                display: block;
            }
            .m-f-1
            {
                margin: 0px 0.5rem;
            }
            .ads-details-wrapper .price 
            {
                padding: 0px 5px;
                font-size: 11px;
            }
            .share
            {
                margin: 20px;
            }
        }
    </style>
    @yield('page-css')
</head>
<body>
    
    @if(!isset($item['adslug']) && !isset($blog->blog_id))
        <div class="hidden-sharer">
            <img src="{{ url('/') }}/public/let-mobile.webp" alt="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan." />
        </div>
    @endif
<!-- Nav Bar  -->
@include('layouts.header')

<!-- Content  -->
@yield('content')

<!-- Footer  -->
@include('layouts.footer')

<a href="<?php echo url('post/postad'); ?>" class="back-to-top btn btn-common"><i class="lni-pencil-alt"></i> Post an Ad
</a>
    <script src="{{ url('/') }}/public/assets/js/jquery-min.js"></script>
    <script src="{{ url('/') }}/public/assets/js/popper.min.js"></script>
    <script src="{{ url('/') }}/public/assets/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/public/assets/js/wow.js"></script>
    <script src="{{ url('/') }}/public/assets/js/jquery.slicknav.js"></script>
    <script src="{{ url('/') }}/public/assets/js/main.js"></script>
    @yield('page-scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('.slicknav_brand a').attr('href','{{ url("/") }}')
        });
        
    </script>
</body>
</html>