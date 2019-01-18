@extends('layouts.pickyhome')

@section('banner')
<div class="page-wrapper">
  <!-- top Links -->
              <div class="top-links">
                  <div class="container">
                      <ul class="row links">
                          <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="{{ url('/')}}">Choose Your Location</a></li>
                          <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                          <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                          <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                      </ul>
                  </div>
              </div>
  <!-- end:Top links -->
  <!-- start: Inner page hero -->
            <section class="inner-page-hero bg-image" data-image-src="{{ asset('images/profile-banner.jpg') }}">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><img height="180"src="{{ asset('storage/'. $restaurant->profile)}}" alt="Profile Image"></figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#">{{$restaurant->name}}</a></h6> <a class="btn btn-small btn-green">{{ $restaurant->openstatus}}</a>
                                    <p>{{$restaurant->banner}}</p>
                                    <ul class="nav nav-inline">
                                        <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ {{App\Menu::where('restaurant_id', $restaurant->id)->min('price')}}</a> </li>
                                        <li class="nav-item ratings">
                                            <a class="nav-link" href="#">
                                              <span>
                                              @for($i = 0; $i < App\Review::where('restaurant_id', $restaurant->id)->avg('star'); $i++)
                                                <i class='fa fa-star'></i>
                                              @endfor
                                              @for($j = 0; $j < (5 - App\Review::where('restaurant_id', $restaurant->id)->avg('star')); $j++)
                                                <i class="fa fa-star-o"></i>
                                              @endfor
                                            </span>
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<!-- end:Inner page hero -->
<div class="breadcrumb">
      <div class="container">
          <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Search results</a></li>
           </ul>
      </div>
</div>

@endsection

@section('popularblock')
<div class="container m-t-30">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="sidebar clearfix m-b-20">
                  <div class="widget-heading">
                      <h3 class="widget-title text-dark">
                    Make a Table Reservation
                 </h3>
                      <div class="clearfix"></div>
                  </div>
                  <div class="widget-body">
                  <form action="{{ route('reservation.create')}}" method="POST">
                    <input type="hidden" value="{{$restaurant->id}}" name="restaurantid" />
                    @csrf
                    <div class="form-group">
                      <label for="table" class="col-form-label">No. Of Tables:</label>
                      <select class="form-control" name="table" id="table" required>
                        <option class="form-control">1</option>
                        <option class="form-control">2</option>
                        <option class="form-control">3</option>
                        <option class="form-control">4</option>
                        <option class="form-control">5</option>
                        <option class="form-control">6</option>
                        <option class="form-control">7</option>
                        <option class="form-control">8</option>
                        <option class="form-control">9</option>
                        <option class="form-control">10</option>
                        <option class="form-control">11</option>


                      </select>
                    </div>
                    <div class="form-group">
                      <label for="time" class="col-form-label">Time:</label>
                      <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                      <label for="date" class="col-form-label">Date:</label>
                      <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                      <label for="duration" class="col-form-label">Duration: <small>in hours</small></label>
                      <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-block" required>Make Reservation</button>
                  </form>
                  </div>

                    <div class="clearfix"></div>

            </div>
            <!-- end:Left Sidebar -->
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
                     Coupons
                     </a> </li>
                        <li> <a href="#" class="tag">
                     Discounts
                     </a> </li>
                        <li> <a href="#" class="tag">
                     Deals
                     </a> </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            <div class="menu-widget m-b-30">
                <div class="widget-heading">
                    <h3 class="widget-title text-dark">
                  POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                  <i class="fa fa-angle-right pull-right"></i>
                  <i class="fa fa-angle-down pull-right"></i>
                  </a>
               </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="collapse in" id="1">
                  @foreach($menus as $menu)
                  <?php $i++; ?>
                  <div class="food-item {{ ($i%2 == 0) ? 'white' : '' }}">
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-lg-8">
                              <div class="rest-logo pull-left">
                                  <a class="restaurant-logo pull-left" href="#"><img src="{{ asset('storage/'.$menu->image)}}" alt="Food logo"></a>
                              </div>
                              <!-- end:Logo -->
                              <div class="rest-descr">
                                  <h6><a href="#">{{ $menu->menuname }}</a></h6>
                                  <p> {{ str_limit($menu->description, 55) }}</p>
                              </div>
                              <!-- end:Description -->
                          </div>
                          <!-- end:col -->
                          <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ {{$menu->price}}</span> <a href="{{url('restaurant/menu/addtocart/'.$menu->id)}}" class="btn btn-small btn btn-secondary pull-right" >&#43;</a> </div>
                      </div>
                      <!-- end:row -->
                  </div>
                  <!-- end:Food item -->
                  @endforeach
                </div>
                <!-- end:Collapse -->
            </div>
            <!-- end:Widget menu -->
            <div class="row m-t-30">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false">Review our Restaurant</a></h4> </div>
                        <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                            <div class="panel-body">
                              <form action="{{ route('review.create')}}" method="POST">
                                <input type="hidden" value="{{$restaurant->id}}" name="restaurantid" />
                                @csrf
                                <div class="form-group">
                                  <label for="rating" class="col-form-label">Star Rating:</label>
                                  <select class="form-control" name="star" id="rating">
                                    <option class="form-control">1</option>
                                    <option class="form-control">2</option>
                                    <option class="form-control">3</option>
                                    <option class="form-control">4</option>
                                    <option class="form-control">5</option>


                                  </select>
                                </div>
                                <div class="form-group row">
                                    <label for="review" class="col-sm-4 col-form-label">{{ __('Comments:') }}</label>

                                    <div class="col-md-12">
                                      <textarea id="review" class="form-control" name="comment"  required autofocus></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Add Review</button>

                              </form>
                            </div>
                        </div>
                    </div>
                    <!--//panel-->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2"><i class="ti-info-alt"></i>Other Reviews</a></h4> </div>
                        <div class="panel-collapse collapse" id="faq2">
                            <div class="panel-body">
                              @if($rev)
                              @foreach($rev as $review)
                                <strong>{{$review->user->name }}</strong>
                                <p>{{$review->comment}}</p>
                              @endforeach
                              @else
                                There are no reviews at this time
                              @endif
                            </div>
                        </div>
                    </div>
                    <!--//panel-->
                </div>
            </div>
            <!--/row -->
        </div>
        <!-- end:Bar -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <div class="sidebar clearfix m-b-20">
                <div class="widget-heading">
                    <h3 class="widget-title text-dark">
                  Meet our Chefs
               </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-body">
                @foreach($chefs as $chef)
                <img src="{{ asset('/storage/'.$chef->chefavi)}}" width="100%" />
                <strong>Name:</strong><br> {{ $chef->chefname }}<br><br>
                <strong>Bio:</strong><br><small>{{ $chef->chefdesc }}</small>
                <hr>
                @endforeach
                </div>

                  <div class="clearfix"></div>

          </div>
        </div>
    </div>
    <!-- end:row -->
</div>

@endsection

@section('howitworks')

@endsection

@section('featuredblock')

@endsection

@section('appsection')
</div>
@endsection
