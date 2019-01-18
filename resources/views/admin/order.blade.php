@extends('layouts.app')

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
            <a href="{{ url('/admin')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('admin.menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('admin.order')}}" class="list-group-item list-group-item-action active">Orders</a>
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action">Chefs</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>
            <form action="{{ route('order.filter')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="id" class="col-form-label">Restaurant: </label>
                <select class="form-control col-md-12" id="id" name="id" onchange="this.form.submit()">
                  <option value="" selected="selected">Select Restaurant</option>
                  @foreach(App\Restaurant::all() as $res)
                      <option value="{{$res->id}}">{{$res->name}}</option>
                  @endforeach
                </select>
              </div>
            </form>


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
                <th scope="col">Restaurant</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            @if( isset($orders))
            @foreach($orders as $order)
              @foreach($order->menus as $menu)
                @if($id && $id != $menu->restaurant->id)

                  @else
                  <tbody>
                    <tr>
                      <td>#{{ $order->id }}</td>
                      <td>
                            {{ $menu->pivot->quantity. " ".$menu->menuname }}<br>
                      </td>
                      <td>{{ str_limit($order->user->name, 10) }}</td>
                      <td>{{ str_limit($order->deliveryaddress, 20) }}</td>
                      <td>
                        {{ $menu->pivot->quantity*$menu->price }}
                      </td>
                      <td>
                            {{$menu->restaurant->name}}<br>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning" title="Edit" href="#modalUpdate" data-toggle="modal" data-href="{{url('restaurant/order/'.$order->id)}}">View / Update</a>
                      </td>
                    </tr>
                  </tbody>

                @endif
              @endforeach
            @endforeach
            @endif
          </table>

        </div>
    </div>
</div>
</section>


@endsection
