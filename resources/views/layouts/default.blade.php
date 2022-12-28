<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/lightslider.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('page-css')
</head>
  <body>
    <div class="TopNav">
        <div class="topNavSocial p-2">
            <div class="container">
                <ul class="float-left p-0 m-0 d-none d-sm-inline d-xs-inline">
                    <li class="mr-3"><a href="https://www.facebook.com/letmobilepkofficial" target="_blank"><img src="{{ asset('assets/images/facebook.png') }}" alt="Let Mobile Facebook Page"></a></li>
                    <li class="mr-3"><a href="https://www.pinterest.com/letmobilepk/" target="_blank"><img src="{{ asset('assets/images/pintrest.png') }}" alt="Let Mobile Pintrest Profile"></a></li>
                    <li class="mr-3"><a href="https://twitter.com/LetMobile1" target="_blank"><img src="{{ asset('assets/images/twitter.png') }}" alt="Let Mobile Twitter Profile"></a></li>
                    <li class="mr-3"><a href="https://www.instagram.com/letmobilepk/" target="_blank"><img src="{{ asset('assets/images/insta.png') }}" alt="Let Mobile Instagram Account"></a></li>
                </ul>
                <!-- hide float-end on mobile -->
                <ul class=" d-inline 
                @if((new \Jenssegers\Agent\Agent())->isDesktop())
                    float-end
                @endif
                ">
                    <li class="d-none d-sm-inline d-xs-inline"><a href="{{ url('post/postad') }}" class="text-white fs-6 text-decoration-none">Post Ad</a></li>
                    <li><a href="{{ url('favourite') }}" class="text-white fs-6 text-decoration-none">Favourite</a></li>
                    @if ( Auth::guest() )
                        <li><a href="{{ url('login') }}" class="text-white fs-6 text-decoration-none">Login</a></li>
                        <li><a href="{{ url('register') }}" class="text-white fs-6 text-decoration-none">Register</a></li>
                    @else
                        <li><a class="text-white fs-6 text-decoration-none" href="{{url('user')}}/{{ Session::get('slug') }}">My Ads</a></li>
                    @endif
                    
                </ul>
                </ul>
            </div>
        </div>
        @include('layouts.search')
    </div>
    <div class="mt-3"></div>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <div class="BtmFooter">
        <p class="text-center dev  m-0 text-white">Designed and Developed by Let Mobile</p>
    </div>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="close filter-close">&times;</button>
                </div>
                <div class="modal-body">
                    @include('frontend.partials.mobile-filter')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightslider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".search--icon").click(function(){
                $("#myModal").modal('show');
            });
            $(".filter-close").click(function(){
                $("#myModal").modal('hide');
            });
        });
    </script>
    @yield('page-scripts')
  </body>
</html>
