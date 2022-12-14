@extends('layouts.default')
@section('title')
<title>Let Mobile | Buy or Sell Used Mobile Phone and New Mobile Phone on Instalments</title>
<meta name="description" content="LetMobile.pk is a website where you can buy or sell Used Mobile Phone and New Mobile Phone on Instalments. Now you can Sell, Buy or get at one place.">
@stop
@section('page-css')

@stop
@section('content')
<div class="container mt-5">
    <div class="Main">
        <div class="MainInnserDiv">
            <div class="InnerCategoriesSec mt-4 mb-5">
                <div class="container">
                    <div class="row">
                        @include('frontend.partials.filters')
                        <div class="col-md-9 DetailBox">
                            <div class="AdsText d-none d-sm-block d-xs-block">
                                <h4 class="">Find Used or Old, New and Installment Mobiles in Pakistan</h4>
                                <p class="">Buy and sell thousands of Mobile Phones, we have just the right one for you</p>
                                <a href="./post-ad.php" class="btn-Ads p-2 text-decoration-none"><img src="{{ asset('assets/images/post-icon.png') }}" alt=""> Post an ad</a>
                            </div>
                            <div class="row ">
                                @if($ads->isNotEmpty())
                                    @foreach($ads as $row)
                                        <?php
                                            $images = explode(',', $row['adimgs']);
                                            if ($row['aid']%2 == 0) {
                                                $alt = $row['brand']['brand'].' phones price in '.$row['city']['city'];
                                            }
                                            else {
                                                $alt = $row['brand']['brand'] . ' price in pakistan';
                                            }
                                        ?>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="featured-box mt-2">
                                                <div class="f-image">
                                                    <a class="text-decoration-none text-black" href="{{ url($row['adslug'])}}">
                                                        <img src="{{ asset('images').'/'.$images[0] }}" alt="{{ $alt ?? '' }}" width="100%">
                                                    </a>
                                                </div>
                                                <div class="p-2 position-relative">
                                                    <div class="div">
                                                        <h5 class="fs-6  d-inline"><a class="text-decoration-none text-black" href="{{ url($row['adslug']) }}">{{ @ucwords(substr($row['adtitle'],0,20)) }}...</a> </h5>
                                                        <a href="#" class="d-inline"><img src="{{ asset('assets/images/like.png') }}" alt="Like" class="float-end"></a>
                                                    </div>
                                                    <p class="mt-1">
                                                        <button class="btn-rupees uppercase">Rs.<?php echo number_format(str_replace(',','',@$row['adprice'])) ?></button>
                                                        <span class="float-end fw-bold pt-1">
                                                            @if($row['cond'] == '0')
                                                                <a class="text-decoration-none" href="{{ url('category/used') }}"> Used</a>
                                                            @elseif($row['cond'] == '1')
                                                                <a class="text-decoration-none" href="{{ url('category/new') }}"> New</a>
                                                            @elseif($row['cond'] == '2')
                                                                <a class="text-decoration-none" href="{{ url('category/installments') }}"> Installment</a>
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <div class="locationInfo pt-2 mt-2">
                                                        <img src="{{ asset('assets/images/location-icon.png') }}" alt="">
                                                        <a href="{{ url('city/'.$row['city']['cityslug'])}}" class="text-decoration-none"> <b style="color: #000;"> {{ @ucwords($row['city']['city']) }}</b> </a>
                                                        <span class="float-end"><?php $dt = Carbon::parse($row['created_at']);echo $dt->diffForHumans(); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="btn-ad btn-rupees p-3 w-25 fs-5 mt-5 mb-5 d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin: 0 auto;">Load more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-scripts')

@stop
