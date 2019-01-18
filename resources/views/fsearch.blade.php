@extends('layouts.pickyhome')
  @section('banner')
  <div class="page-wrapper">
  <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index.html">Choose Your Location</a></li>
                        <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
  <!-- end:Top links -->
  <div class="inner-page-hero bg-image" data-image-src="images/profile-banner.jpg">
          <div class="container"> </div>
          <!-- end:Container -->
  </div>
  <div class="result-show">
      <div class="container">
          <div class="row">
              <div class="col-sm-3">
                  <p><span class="primary-color"><strong>@if($menus){{ $menus->count() }} @endif</strong></span> Results so far </div>
              </p>

          </div>
      </div>
  </div>
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
                          @if($menus)
                          @foreach($menus as $menu)
                          <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                          <div class="food-item-wrap">
                              <div class="figure-wrap bg-image" data-image-src="{{ asset('images/'.$menu->image) }}">
                                  <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                  <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                  <div class="review pull-right"><a href="#">198 reviews</a> </div>
                              </div>
                              <div class="content">
                                  <h5><a href="profile.html">{{$menu->menuname}}</a></h5>
                                  <div class="product-name">{{ str_limit($menu->description, 40)}}</div>
                                  <div class="price-btn-block"> <span class="price">$ {{ $menu->price}}</span> <a href="{{url('restaurant/menu/addtocart/'.$menu->id)}}" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                              </div>
                              <div class="restaurant-block">
                                  <div class="left">
                                      <a class="pull-left" href="profile.html"> <img src="{{ asset('storage/'.$menu->restaurant->profile) }}" width="50" height="50" alt="Restaurant logo" /> </a>
                                      <div class="pull-left right-text"> <a href="#">{{ $menu->restaurant->name}}</a> <span>{{ str_limit($menu->restaurant->address, 10) }}</span> </div>
                                  </div>
                                  <div class="right-like-part pull-right"> <i class="fa fa-heart-o"></i> <span>48</span> </div>
                              </div>
                          </div>
                          </div>
                          @endforeach
                          @else
                            <p>No Item match your search criteria</p>
                          @endif
                        </div>
                    </div>
                </div>
            </section>

  @endsection


  @section('appsection')
</div>
  @endsection
