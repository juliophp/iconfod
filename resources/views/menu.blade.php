@extends('layouts.resapp')

@section('content')


<section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Our Menus</h3>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach ($menus as $menu)
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="{{url('restaurant/'.$menu->id)}}">
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
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p></p>
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
  </section>
              <!--//END FEATURED PLACES -->


@endsection
