@extends('layouts.default')
@section('title')
<title>{{ ucwords(request()->segment(2)) }} Mobile Phones | Let Mobile</title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.Let mobile Classified Sell and Buy mobile phones ads website in Pakistan">
@stop
@section('page-css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop
@section('content')
<header id="header-wrap">
<div id="hero-area">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                <div class="contents-ctg">
                    <div class="search-bar">
                        <div class="search-inner">
                            <form action="" accept-charset="utf-8" method="get" class="search-form">
                                <div class="form-group inputwithicon">
                                    <i class="lni-target"></i>
                                    <input type="text" name="loc" id="loc"  class="form-control" placeholder="Enter Location"> 
                                </div>
                                <div class="form-group inputwithicon">
                                    <i class="lni-tag"></i>
                                    <input type="text" id="search" name="s"  class="form-control" placeholder="Enter keywords"> </div>
                                <div class="form-group inputwithicon">
                                    <i class="lni-tag"></i>
                                    <input type="text" name="min"  class="form-control" placeholder="min price"> </div>
                                <div class="form-group inputwithicon">
                                    <i class="lni-tag"></i>
                                    <input type="text" name="max" class="form-control" placeholder="max price"> </div>
                                <button name="" type="submit" class="btn btn-common"><i class="lni-search"></i> Search Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<section class="featured section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="heading">
                    <h1 class="section-title">{{ $user->fname. ' ' .$user->lname }} Ads</h1>
                    <h4 class="sub-title">Discover & connect with top-rated Mobiles ads</h4>
                </div>
            </div>
            @if($ads) 
            @foreach($ads as $row)
            <?php $images = explode(',', $row['adimgs']) ?>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="featured-box">
                    <figure>
                        <a href="{{ url('brand') }}/{{ $row['brand']['brand'] }}">
                            <div class="homes-tag featured">{{ @ucwords($row['brand']['brand']) }} </div>
                        </a>
                        <div class="homes-tag rent"><i class="lni-camera"></i> {{ count($images) }}</div>
                        <span class="price-save">Rs.<?php echo number_format(str_replace(',','',@$row['adprice'])) ?></span>
                        <a href="{{ url($row['adslug'])}}"><img class="img-fluid img-width-100" src="{{ url('public/images').'/'.$images[0] }}" alt="{{ @ucwords($row['adtitle']) }}"></a>
                    </figure>
                    <div class="content-wrapper">
                        <div class="feature-content">
                            <h2><a href="{{ url($row['adslug']) }}">{{ @ucwords(substr($row['adtitle'],0,17)) }}...</a></h2>
                            
                            <div class="meta-tag">
                                <div class="user-name">
                                    <a href="{{ url('ads') }}/{{ $row['user']['usrslug'] }}"><i class="lni-user"></i> {{ @ucwords(substr($row['selname'],0,12)) }}</a>
                                </div>
                                <div class="listing-category">
                                    @if($row['cond'] == '0')
                                        <a href="{{ url('category/used') }}"><i class="lni-mobile"></i> Used</a>
                                    @elseif($row['cond'] == '1')
                                        <a href="{{ url('category/new') }}"><i class="lni-mobile"></i> New</a>
                                    @elseif($row['cond'] == '2')
                                        <a href="{{ url('category/installments') }}"><i class="lni-mobile"></i> Installment</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="listing-bottom clearfix">
                            <a href="{{ url('city/'.$row['city']['cityslug'])}}" class="float-left"><i class="lni-map-marker"></i> {{ @ucwords($row['city']['city']) }}</a>
                            <a class="float-right"><?php $dt = Carbon::parse($row['created_at']); echo $dt->diffForHumans(); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    </section>
    <div class="pagination-bar">
        {{ $ads->onEachSide(1)->links('vendor.pagination.default') }}
    </div>
@stop
@section('page-scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "{{url('search/home')}}",
            data: {
                term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
  $(document).ready(function() {
    $( "#loc" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "{{url('search/location')}}",
            data: {
                term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
</script> 
@stop