@extends('layouts.pickyhome')

@section('banner')
<div class="page-wrapper">
    <!-- top Links -->
    <div class="top-links">
        <div class="container">
            <ul class="row links">
                <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="{{url('/')}}">Choose Your Location</a></li>
                <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="{{route('restaurants')}}">Choose Restaurant</a></li>
                <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="#">Pick Your favorite food</a></li>
                <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="#modalCart" data-toggle="modal" data-href="{{route('cart.get')}}">Order and Pay online</a></li>
            </ul>
        </div>
    </div>
    <!-- end:Top links -->
    <!-- start: Inner page hero -->
    <div class="inner-page-hero bg-image" data-image-src="images/profile-banner.jpg">
        <div class="container"> </div>
        <!-- end:Container -->
    </div>
    <div class="result-show">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <p><span class="primary-color"><strong>{{@count(App\Restaurant::all())}}</strong></span> Results so far </div>
                </p>
                <div class="col-sm-9">
                    <select class="custom-select pull-right">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- //results show -->

@endsection

@section('popularblock')
<section class="restaurants-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">

                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                     Price range
                  </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                            <br>
                            <input id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="35" /> </div>
                    </div>
                </div>
                <!-- end:Pricing widget -->
                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                     Popular tags
                  </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <ul class="tags">
                            <li> <a href="#" class="tag">
                        Pizza
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Sendwich
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Sendwich
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Fish
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Desert
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Salad
                        </a> </li>
                        </ul>
                    </div>
                </div>
                <!-- end:Widget -->
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
              @foreach(App\Restaurant::all() as $res)
                <div class="bg-gray restaurant-entry">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                            <div class="entry-logo">
                                <a class="img-fluid" href="{{route('resprofile', $res->id)}}"><img src="{{ asset('storage/'.$res->profile)}}" alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="entry-dscr">
                                <h5><a href="{{route('resprofile', $res->id)}}">{{$res->name}}</a></h5> <span>@if($res->banner){{ $res->banner }} <a href="{{route('resprofile', $res->id)}}">...</a>@else{{'Burgers, American, Sandwiches, Fast Food, BBQ,urgers, American, Sandwiches'}} <a href="{{route('resprofile', $res->id)}}">...</a></span>@endif
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-check"></i>$ {{App\menu::where('restaurant_id', $res->id)->min('price')}}</li>
                                    <li class="list-inline-item"><i class="fa fa-motorcycle"></i>{{ $res->deliverytime}}</li>
                                </ul>
                            </div>
                            <!-- end:Entry description -->
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                            <div class="right-content bg-white">
                                <div class="right-review">
                                    <div class="rating-block">
                                      @for($i = 0; $i < App\Review::where('restaurant_id', $res->id)->avg('star'); $i++)
                                        <i class='fa fa-star'></i>
                                      @endfor
                                      @for($i = 0; $i < (5 -App\Review::where('restaurant_id', $res->id)->avg('star')); $i++)
                                        <i class="fa fa-star-o"></i>
                                      @endfor
                                    </div>
                                    <p> {{@count($res->review)}} Reviews</p> <a href="{{route('resprofile', $res->id)}}" class="btn theme-btn-dash">View Menu</a> </div>
                            </div>
                            <!-- end:right info -->
                        </div>
                    </div>
                    <!--end:row -->
                </div>
              @endforeach
            </div>
        </div>
    </div>
</section>
</div>
@endsection
