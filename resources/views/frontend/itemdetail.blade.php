@extends('layouts.default')
@section('title')
    <?php $imgs = ''; $ar = explode(',', $item['adimgs']);?>
    <title>{{ ucwords($item['adtitle']) }} | Let Mobile </title>
    <meta name="description" content="{{ ucwords($item['adtitle']) }} | {{ ucwords($item['city']['city']) }} | {{ ucwords($item['brand']['brand']) }}  | Let Mobile | Used Mobile | Installments Mobile | New Mobiles | Sale and Buy">
    <meta property="og:url" content="{{ url('/') }}/{{ $item['adslug'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ ucwords($item['adtitle']) }}" />
    <meta property="og:image" content="{{ url('images/'.$ar[0]) }}" />
    <meta property="og:image:alt" content="{{ ucwords($item['adtitle']) }}" />
@stop

@section('content')
<div class="hidden-sharer">
    <img src="{{ asset('images/'.$ar[0]) }}" alt="{{ ucwords($item['adtitle']) }}" />
</div>
<?php
    $imgs = '';
	if(@$item) {
		$ar = explode(',', $item['adimgs']);
        $per = '';
        if($item['cond'] == '2')
        {
            $per = '/per Installment';
        }
		if(count($ar) > 0){
			for($i = 0; $i < count($ar); $i++){
				$imgs .= '<li><a href="'.asset('images/'.$ar[$i]).'" target="_blank"><img src="'.asset('images/'.$ar[$i]).'" alt="'.$item["brand"]["brand"].' phones price in '. ucwords($item["city"]["city"]) .'" class="detail-img"></a></li>';
			}
		} else {
			$imgs = '<div class="item"><div class="product-img"><img src="'.asset('images/noimage.png').'" alt=""'.$item["brand"]["brand"].' phones price in '. ucwords($item["city"]["city"]) .$per.'""/></div><span class="price">Rs. '.number_format(str_replace(',','',@$item["adprice"])).'</span></div>';
		}
	}
?>
<div class="Main pt-3">
    <div class="MainInnserDiv pt-3">
        @if((new \Jenssegers\Agent\Agent())->isDesktop())
        <div class="DetailSec">
            <div class="container">
                <div class="BreadcrumbSec position-relative mb-1">
                    <ul>
                        <li><a href="{{ url('/') }}" class="text-dark text-decoration-none">Home /</a></li>
                        <li><a href="{{ url('/') }}?brand[]={{ $item['br_id'] ?? '' }}" class="text-dark text-decoration-none">{{ ucwords(($item["brand"]["brand"])).' Phones' }} /</a></li>
                        <li><a href="{{ url('/') }}?loc[]={{ $item['loc_id'] ?? '' }}" class="text-dark text-decoration-none">{{ 'Mobile Phones in ' .ucwords($item["city"]["city"]) }} /</a></li>
                        <li><a href="{{ url('/') }}?q={{ $item['adadress'] ?? '' }}" class="text-dark text-decoration-none">{{ 'Mobile Phones in ' .ucwords($item["adadress"]) }} </a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="DetailpageSlider mt-3">
                    <ul id="Detail-slider" class="DetailSliderCS">
                        {!! $imgs ?? '' !!}
                    </ul>
                </div>
                @if((new \Jenssegers\Agent\Agent())->isMobile())
                    <div class="BrandDetail pt-3">
                        <div class="position-relative">
                            <h5 class="fs-4">{{ ucwords($item['adtitle']) }}</h5>
                            <div class="d-inline">
                                <img src="{{ asset('assets/images/like.png') }}" alt="Like" class="float-end">
                            </div>
                            @php
                            $per = ''; if($item['cond'] == '2') { $per = '/per Installment'; }
                            @endphp
                            <button class="btn-rupees uppercase mb-2">Rs. {{number_format(str_replace(',','',@$item["adprice"])).$per}}</button>
                            <p class="locationInfo border-top pt-2 m-0">
                                <img src="{{ asset('assets/images/location-icon.png') }}" alt="location">
                                <b style="color: #000;">
                                    <a href="{{ url('/') }}?loc[]={{ $item['loc_id'] ?? '' }}" class="text-dark text-decoration-none"> {{ ucwords($item['adadress']) }}, {{ ucwords($item["city"]["city"]) }}</a>
                                </b>
                                <span class="float-end">{{ date('d M h:i a', $item['adtime']) }}</span>
                            </p>
                        </div>
                        <div class="ProfileDetail position-relative mt-3">
                            <img src="{{ asset('profiles') }}/{{ $item['user']['image'] }}" onerror="this.src='{{ asset('assets/images/profile-icon.png') }}'" alt="" class="profile-icon d-none d-sm-inline d-xs-inline">
                            <h5 class="fs-4">{{ ucwords($item['selname']) }}</h5>
                            <ul>
                                <li class="pb-2"><img src="{{ asset('assets/images/phone-icon.png') }}" alt=""><b>{{ $item['adphone'] ?? '' }}</b></li>
                            </ul>
                            <div class="mt-2">
                                <a class="call-button">Make Call</a>
                                <a class="call-button">Call Me</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="DetailText mt-3">
                    <h4 class="text-decoration-underline">Details:</h4>
                    <ul class="pt-2">
                        <li>Brand: <b><a href="{{ url('/') }}?brand[]={{ $item['br_id'] ?? '' }}" class="text-dark text-decoration-none">{{ ucwords(($item["brand"]["brand"])).' Phones' }} </a></b></li>
                        <li>Condition: <b>
                            @if($item['cond'] == '0')
                                <a href="{{ url('/') }}?cond[]=0" class="text-dark text-decoration-none">Used</a>
                            @elseif($item['cond'] == '1')
                                <a href="{{ url('/') }}?cond[]=1" class="text-dark text-decoration-none">New</a>
                            @elseif($item['cond'] == '2')
                                <a href="{{ url('/') }}?cond[]=2" class="text-dark text-decoration-none">On Installments</a>
                            @endif
                            </b>
                        </li>
                        <li>Views: <b>{{$item['postview_count'] ?? 0}}</b></li>
                    </ul>
                    <h4 class="text-decoration-underline mt-3">Description:</h4>
                    <div class="pt-2"> {!! htmlspecialchars_decode($item['ad_description']) !!} </div>
                </div>
            </div>
            <div class="col-md-6">
                @if((new \Jenssegers\Agent\Agent())->isDesktop())
                    <div class="BrandDetail pt-3">
                        <div class="position-relative">
                            <h5 class="fs-4">{{ ucwords($item['adtitle']) }}</h5>
                            <div class="d-inline">
                                <img src="{{ asset('assets/images/like.png') }}" alt="Like" class="float-end">
                            </div>
                            @php
                            $per = ''; if($item['cond'] == '2') { $per = '/per Installment'; }
                            @endphp
                            <button class="btn-rupees uppercase mb-2">Rs. {{number_format(str_replace(',','',@$item["adprice"])).$per}}</button>
                            <p class="locationInfo border-top pt-2 m-0">
                                <img src="{{ asset('assets/images/location-icon.png') }}" alt="location">
                                <b style="color: #000;">
                                    <a href="{{ url('/') }}?loc[]={{ $item['loc_id'] ?? '' }}" class="text-dark text-decoration-none"> {{ ucwords($item['adadress']) }}, {{ ucwords($item["city"]["city"]) }}</a>
                                </b>
                                <span class="float-end">{{ date('d M h:i a', $item['adtime']) }}</span>
                            </p>
                        </div>
                        <div class="ProfileDetail position-relative mt-3">
                            <img src="{{ asset('profiles') }}/{{ $item['user']['image'] }}" onerror="this.src='{{ asset('assets/images/profile-icon.png') }}'" alt="" class="profile-icon d-none d-sm-inline d-xs-inline">
                            <h5 class="fs-4">{{ ucwords($item['selname']) }}</h5>
                            <ul>
                                <li class="pb-2"><img src="{{ asset('assets/images/phone-icon.png') }}" alt=""><b>{{ $item['adphone'] ?? '' }}</b></li>
                            </ul>
                            <div class="mt-2">
                                <a class="call-button">Make Call</a>
                                <a class="call-button">Call Me</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="MapSec mt-3">
                    <object style="border:0; height: 300px; width: 100%;" data="https://www.google.com/maps/embed/v1/place?q={{ urlencode($item['adadress']) }},{{ $item['city']['city'] }}&key=AIzaSyAy_OvtbZn9ktU5njKItgbAHBozJ8vRbNg"></object>
                    <a target="_blank" href="https://www.google.com/maps?q={{ urlencode($item['adadress']) }},{{ $item['city']['city'] }}" class="GetDirectionbtn float-end mt-2 bg-white text-decoration-none"><img src="{{ asset('assets/images/dircetion.png') }}" alt=""> Get Direction</a>
                </div>
            </div>
        </div>
        </div>
        <div class="InnerCategoriesSec DetailPageSec mt-4">
            <div class="container">
                <div class="AdsText  mt-5">
                    <h2 class="fs-5">Related Mobiles Ads</h2>
                </div>
                <div class="row mb-3">
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="featured-box mt-2">
                                    <div class="f-image">
                                        <a class="text-decoration-none text-black" href="{{ url($row['adslug'])}}">
                                            <img src="{{ asset('images').'/'.$images[0] }}" alt="{{ $alt ?? '' }}" width="100%">
                                        </a>
                                    </div>
                                    <div class="p-2 position-relative">
                                        <div class="div">
                                            <h5 class="fs-6  d-inline"><a class="text-decoration-none text-black" href="{{ url($row['adslug']) }}"> {{ @ucwords(substr($row['adtitle'],0,20)) }}...</a> </h5>
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
            </div>
        </div>
    </div>
    <div class="sticky-footer">
        <a class="call-button">Make Call</a>
        <a class="call-button">Call Me</a>
        <a class="call-button">Save</a>
    </div>
</div>
@stop

@section('page-scripts')

@stop
