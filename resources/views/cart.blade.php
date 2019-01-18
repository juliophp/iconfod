<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Cart Items</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
<form action="{{ route('order.create') }}" method="POST">
  @csrf
  <div class="container-fluid">
      @if(Session::has('cart'))
          <div class="row">
            <div class=" col-md-12 col-md-offset-3">
              <ul class="list-group">
                @foreach($menus as $menu)
                  <li class="list-group-item">
                    <span>{{ $menu['qty'] }} </span>
                    <input type="hidden" name="quantity[{{ $menu['item']['id'] }}]" value="{{ $menu['qty'] }} ">
                    <input type="hidden" name="restaurantid[{{ $menu['item']['id'] }}]" value="{{ $menu['item']['restaurant_id'] }} ">
                    <input type="hidden" name="menuid[{{ $menu['item']['id'] }}]" value="{{ $menu['item']['id'] }} ">
                    <input type="hidden" name="menuprice[{{ $menu['item']['id'] }}]" value="{{ $menu['item']['price'] }} ">

                    <strong> {{ $menu['item']['menuname'] }}</strong>
                    <span class="label label-success"> TL{{ $menu['price'] }} </span>
                    <small>from {{ $menu['item']->restaurant->name }}</small>


                  </li>

                @endforeach
                <input type="hidden" name="totalprice" value="{{ $totalPrice }} ">

              </ul>
              <div class="form-group row">
                  <label for="address" class="col-sm-4 col-form-label">{{ __('Delivery Address:') }}</label>

                  <div class="col-md-12">
                    <textarea id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"  required autofocus>{{ old('address', $user->address) }}</textarea>

                      @if ($errors->has('address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="pmode" class="col-sm-5 col-form-label">{{ __('Payment Medium:') }}</label>

                  <div class="col-md-12">
                    <select name="pmode" class="form-control{{ $errors->has('pmode') ? ' is-invalid' : '' }}">
                      <option value="Cash">Cash On Delivery</option>
                    </select>
                      @if ($errors->has('address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <strong>Total: TL{{ $totalPrice }}</strong>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <button type="submit" class="btn btn-sm btn-success">Checkout</button>
            </div>
          </div>
      @else
      @endif
  </div>
</form>
</div>
