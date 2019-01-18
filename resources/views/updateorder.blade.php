<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $restname }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
<form action="{{ route('order.update', $order->id) }}" method="POST">
  @method('patch')
  @csrf
  <div class="container-fluid">
          <div class="row">
            <div class=" col-md-12 col-md-offset-3">
              <ul class="list-group">
                @foreach($order->menus as $menu)
                @if($menu->pivot->restaurantid != Auth::user()->id)
                  @continue
                @endif
                <li class="list-group-item">
                  <span>{{ $menu->pivot->quantity }} </span>
                  <strong> {{ $menu->menuname }}</strong>
                  <span class="label label-success"> TL{{ $menu->price }} </span>
                  <a class="btn btn-sm btn-primary" href="#"> {{ $menu->pivot->status }} </a>
                </li>
                @endforeach
              </ul>
              <small>Delivery Address: {{ $order->deliveryaddress }}</small>
              <br>
              <small>Customer Name: {{ $order->user->name }}</small>
              <br>
              <small>Total price:
                @foreach($order->menus as $menu)
                @if($menu->pivot->restaurantid == Auth::user()->id)
                   <?php $price += $menu->pivot->price ?>
                @endif
              @endforeach
              TL{{ $price }}
              <?php $price = 0 ?>
            </small><br>
            <small>Restaurant: {{ $order->menus->first()->restaurant->name }}</small>
            <br><small>Ticket No: {{$order->id }}</small>
            <br><small>Phone: {{$order->user->phone }}</small>





              <div class="form-group row">
                  <label for="updatestatus" class="col-sm-4 col-form-label">{{ __('Update Status:') }}</label>

                  <div class="col-md-12">
                    <select class="form-control" id="updatestatus"  name="status"  required autofocus>
                      <option>On Transit</option>
                      <option>Delivered</option>
                    </select>

                  </div>
              </div>
              <div class="form-group row">
                  <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>
              </div>
            </div>
          </div>

          </div>
  </div>

</form>
</div>
