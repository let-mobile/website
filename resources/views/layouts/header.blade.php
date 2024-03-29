 <header id="header-wrap">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            @if ( Auth::guest() )
                <a href="{{ url('user/signin') }}" class="login--btn"><i class="lni-user"></i> Log In</a>
            @else
                <a class="login--btn" href="{{url('user')}}/{{ Session::get('slug') }}">My Ads</a>
            @endif
            <div class="theme-header clearfix">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('/') }}/public/let-mobile.webp"  alt="Let Mobile"></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-left">
                        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                            <a class="nav-link" href="<?php echo url('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown {{ (request()->segment(1) == 'category') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category <i class="lni-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'new') ? 'active' : '' }}" href="<?=url('category/new')?>">New Mobile</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'used') ? 'active' : '' }}" href="<?=url('category/used')?>">Used Mobile</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'installments') ? 'active' : '' }}" href="<?=url('category/installments')?>">Installment Mobile</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown {{ (request()->segment(1) == 'brand') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brands <i class="lni-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'apple') ? 'active' : '' }}" href="<?=url('brand/apple')?>">iPhone</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'samsung') ? 'active' : '' }}" href="<?=url('brand/samsung')?>">Samsung</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'oppo') ? 'active' : '' }}" href="<?=url('brand/oppo')?>">OPPO</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'infinix') ? 'active' : '' }}" href="<?=url('brand/infinix')?>">Infinix</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'huawei') ? 'active' : '' }}" href="<?=url('brand/huawei')?>">Huawei</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'oneplus') ? 'active' : '' }}" href="<?=url('brand/oneplus')?>">Oneplus</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'vivo') ? 'active' : '' }}" href="<?=url('brand/vivo')?>">Vivo</a></li>
                                <li><a class="dropdown-item {{ (request()->segment(2) == 'realme') ? 'active' : '' }}" href="<?=url('brand/realme')?>">Realme</a></li>
                            </ul>
                        </li>
                        <li class="nav-item {{ (request()->segment(1) == 'blogs') ? 'active' : '' }}">
                            <a class="nav-link" href="<?=url("blogs/all")?>">Blogs</a>
                        </li>
                        <li class="nav-item {{ (request()->is('support/contact')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('support/contact')}}">Contact</a>
                        </li>
                    </ul>
                    <div class="header-top-right float-right">
                        @if ( Auth::guest() )
                            <a href="{{ url('user/signin') }}" class="header-top-button"><i class="lni-user"></i> Log In</a> |
                            <a href="{{ url('user/signup') }}" class="header-top-button"><i class="lni-emoji-smile"></i> Register</a>
                        @else
                            <a class="header-top-button" href="{{url('user')}}/{{ Session::get('slug') }}">My Ads</a> |
                            <a class="header-top-button" href="{{url('user/logout')}}">Logout </a>
                        @endif
                    </div>
                    <div class="post-btn">
                        <a class="btn btn-common" href="<?php echo url('post/postad'); ?>"><i class="lni-pencil-alt"></i> Post an Ad</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu" data-logo="{{ url('/') }}/public/let-mobile.webp"></div>
    </nav>
</header>