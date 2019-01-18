@extends('layouts.resapp')

@section('content')
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modal_content">

        </div>
    </div>
</div>
<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/restaurant')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('order')}}" class="list-group-item list-group-item-action active">Orders</a>
            <a href="{{ route('chef')}}" class="list-group-item list-group-item-action">Chefs</a>
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>

          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Orderid</th>
                <th scope="col">Item Ordered</th>
                <th scope="col">Customer</th>
                <th scope="col">Address</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            @if( isset($orders))
            @foreach($orders as $order)
            <tbody>
              <tr>
                <td>#{{ $order->id }}</td>
                <td>
                  @foreach($order->menus as $menu)
                    @if($menu->pivot->restaurantid == Auth::user()->id)
                      {{ $menu->pivot->quantity. " ".$menu->menuname.", " }}
                    @endif
                  @endforeach
                </td>
                <td>{{ str_limit($order->user->name, 10) }}</td>
                <td>{{ str_limit($order->deliveryaddress, 20) }}</td>
                <td>
                  @foreach($order->menus as $menu)
                    @if($menu->pivot->restaurantid == Auth::user()->id)
                       <?php $price += $menu->pivot->price ?>
                    @endif
                  @endforeach
                  {{ $price }}
                  <?php $price = 0 ?>
                </td>
                <td>
                  @foreach($order->menus as $menu)
                    @if($menu->pivot->restaurantid == Auth::user()->id)
                      {{$menu->pivot->status}}
                      @break;

                    @endif
                  @endforeach
                </td>
                <td>
                  <a class="btn btn-sm btn-warning" title="Edit" href="#modalUpdate" data-toggle="modal" data-href="{{url('restaurant/order/'.$order->id)}}">View / Update</a>
                </td>
              </tr>
            </tbody>
            @endforeach
            @endif
          </table>
        </div>
    </div>
</div>
</section>


@endsection
