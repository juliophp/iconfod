@extends('layouts.resapp')

@section('content')
<div class="main-block light-bg">
  <br><br><br><br>
</div>
<!--============================= RESERVE A SEAT =============================-->
<section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ $restaurant->name }}</h5>
                    <p><span>$$$</span>$$</p>
                    <p class="reserve-description">Innovative cooking, paired with fine wines in a modern setting.</p>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-rating">
                            <span>9.5</span>
                        </div>
                        <div class="review-btn">
                            <a href="#" class="btn btn-outline-danger">WRITE A REVIEW</a>
                            <span>0 reviews</span>
                        </div>
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">RESERVE A SEAT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                  <div class="row">
                  @foreach ($menus as $menu)
                    <div class="col-md-6 featured-responsive" id="{{$menu->id}}">
                        <div class="featured-place-wrap">
                            <a href="{{ route('cart.add', $menu->id)}}">
                                <img src="{{ asset('storage/'.$menu->image) }}" class="img-fluid" alt="#">
                                <span class="featured-rating-green">9.6</span>
                                <div class="featured-title-box">
                                    <h6>{{ $menu->menuname }}</h6>
                                    <p>Menu </p> <span>• </span>
                                    <p>0 Reviews</p> <span> • </span>
                                    <p><span>$</span>{{$menu->price}}</p>
                                    <ul>
                                        <li>
                                            <p>{{ str_limit($menu->description, 32) }}</p>
                                        </li>
                                    </ul>
                                    <div class="bottom-icons">
                                        <div class="closed-now">ORDER NOW</div>
                                        <span class="ti-heart"></span>
                                        <span class="ti-bookmark"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                  </div>

                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        <img src="{{ asset('styles/images/map.jpg') }}" class="img-fluid" alt="#">
                        <div class="address">
                            <span class="icon-location-pin"></span>
                              {{ " ". $restaurant->address }}
                        </div>
                        <div class="address">
                            <span class="icon-clock"></span>
                            <p>Mon - Sun {{ $restaurant->openingtime }} - {{ $restaurant->closingtime }} <br>
                                <span class="open-now">OPEN NOW</span></p>
                        </div>
                        <a href="#" class="btn btn-outline-danger btn-contact">SEND A MESSAGE</a>
                    </div>
                    <div class="follow">
                        <div class="follow-img">
                            <img src="images/follow-img.jpg" class="img-fluid" alt="#">
                            <h6>Christine Evans</h6>
                            <span>New York</span>
                        </div>
                        <ul class="social-counts">
                            <li>
                                <h6>26</h6>
                                <span>Listings</span>
                            </li>
                            <li>
                                <h6>326</h6>
                                <span>Followers</span>
                            </li>
                            <li>
                                <h6>12</h6>
                                <span>Followers</span>
                            </li>
                        </ul>
                        <a href="#">FOLLOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->

@endsection
