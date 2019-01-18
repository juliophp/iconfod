@extends('layouts.pickyhome')
@section('banner')
<div class="page-wrapper">
  <div class="breadcrumb">
      <div class="container">
          <ul>
              <li><a href="#" class="active">Home</a></li>
              <li>My Orders</li>
          </ul>
      </div>
  </div>
  <section class="contact-page inner-page">
      <div class="container">
        <div class="row">
          <!-- REGISTER -->
          <div class="col-md-9">
            <div class="widget">
                <div class="widget-body">
                  @foreach ($allorders as $order)
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <td>Order id: {{  $order->id }}</td>
                        <?php $now = Carbon\Carbon::now(); ?>
                        <td colspan="3">{{  $order->created_at->diffInDays($now)." " .'Days Ago' }}</td>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($order->menus as $menu)
                    <tr>
                      <td>{{$menu->pivot->quantity ." ".$menu->menuname}}</td>
                      <td>{{$menu->price}}</td>
                      <td>{{$menu->restaurant->name}}</td>
                      <td>{{$menu->pivot->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                Grand Total: {{$order->totalprice}}<br><br>

                @endforeach
                </div>
            </div>
            <!-- end: Widget -->
        </div>
        <!-- /REGISTER -->
        <!-- WHY? -->

        <!-- /WHY? -->
      </div>


@endsection
@section('popularblock')
</div>
</section>
</div>
@endsection
