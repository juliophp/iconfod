@extends('layouts.resapp')

@section('content')


<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/restaurant')}}" class="list-group-item list-group-item-action active">Dashboard</a>
            <a href="{{ route('menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('chef')}}" class="list-group-item list-group-item-action">Chef</a>
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>
            <a  class="list-group-item list-group-item-action" data-toggle="modal" data-target="#updateModal">Update Profile</a>
          </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Restaurant Dashboard</div>

                <div class="card-body">

                <div class="row">
                  <div class="alert alert-primary col-md-4 ml-1"  role="alert">
                    <h4 class="alert-heading">Open Restaurant</h4>
                    <hr>
                    <form action="{{ route('restaurant.update', Auth::user()->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <div class="form-group">
                        <label for="openstatus" class="col-form-label">Status: {{ ucfirst(Auth::user()->openstatus) }}</label>
                        <select class="form-control" id="openstatus" name="openstatus" onchange="this.form.submit()">
                          <option value="closed" @if (Auth::user()->openstatus == 'closed') selected="selected" @endif>Closed</option>
                          <option value="open" @if (Auth::user()->openstatus == 'open') selected="selected" @endif>Open</option>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="alert alert-success col-md-3 ml-1"  role="alert">
                    <h4 class="alert-heading">{{@count(App\Menu::where('restaurant_id', Auth::user()->id)->get())}} Menus</h4>
                    <hr>
                    <p class="mb-0">You have added {{@count(App\Menu::where('restaurant_id', Auth::user()->id)->get())}} Menus, You can create, update and delete menus </p>
                  </div>

                  <div class="alert alert-info col-md-4 ml-1" role="alert">
                    <?php $id = Auth::user()->id ?>
                    <h4 class="alert-heading">{{@count(App\Order::whereHas('menus', function($q) use($id)
                      {$q->where('restaurant_id', $id);})->get())}} Orders</h4>
                    <hr>
                    <p class="mb-0">{{@count(App\Order::whereHas('menus', function($q) use($id)
                      {$q->where('restaurant_id', $id);})->get())}} Orders have been created, You can only view and update as order will be created by customers and deleted by the admin</p>
                  </div>

                </div>
                <div class="row">
                  <div class="alert alert-secondary col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Reservation::where('restaurant_id', Auth::user()->id)->get())}} Reservations</h4>
                    <hr>
                    <p class="mb-0">Customers are allowed to make reservations but you as the restaurant can only view and not delete</p>
                  </div>


                  <div class="alert alert-danger col-md-3 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Chef::where('restaurant_id', Auth::user()->id)->get())}} Chefs</h4>
                    <hr>
                    <p class="mb-0">You can add update and delete chefs, There are currently {{@count(App\Chef::where('restaurant_id', Auth::user()->id)->get())}} Chefs added </p>
                  </div>

                  <div class="alert alert-warning col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Review::where('restaurant_id', Auth::user()->id)->get())}} Reviews</h4>
                    <hr>
                    <p class="mb-0">You can see your reviews and comments, but you can neither delete nor update them.</p>
                  </div>

                </div>




                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('restaurant.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="res-name" class="col-form-label">Restaurant name:</label>
            <input type="text" class="form-control" id="res-name" name="resname" value="{{ Auth::user()->name }}">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
          </div>
          <div class="form-group">
            <label for="res-banner" class="col-form-label">Banner:</label>
            <input type="text" class="form-control" id="res-banner" name="resbanner" value="{{ Auth::user()->banner }}">
          </div>
          <div class="form-group">
            <label for="res-pic" class="col-form-label">Profile Pic:</label>
            <input type="file" class="form-control" id="res-pic" name="resprofile">
          </div>
          <div class="form-group">
            <label for="res-opening" class="col-form-label">Opening Time:</label>
            <input type="time" class="form-control" id="res-opening" name="resopening" value="{{ Auth::user()->openingtime }}">
          </div>
          <div class="form-group">
            <label for="res-closing" class="col-form-label">Closing Time:</label>
            <input type="time" class="form-control" id="res-closing" name="resclosing" value="{{ Auth::user()->closingtime }}">
          </div>
          <div class="form-group">
            <label for="res-delivery" class="col-form-label">Delivery Time:</label>
            <input type="text" class="form-control" id="res-delivery" name="resdelivery" value="{{ Auth::user()->deliverytime }}" placeholder="delivery time in mins">
            <small> *Delivery time in mins </small>
          </div>
          <div class="form-group">
            <label for="res-phone" class="col-form-label">Phone:</label>
            <input type="phone" class="form-control" id="res-phone" name="resphone1" value="{{ Auth::user()->phone1 }}">
          </div>
          <div class="form-group">
            <label for="res-phone2" class="col-form-label">Phone 2</label>
            <input type="text" class="form-control" id="res-phone2" name="resphone2" value="{{ Auth::user()->phone2 }}">
          </div>
          <div class="form-group">
            <label for="address-text" class="col-form-label">Address:</label>
            <textarea class="form-control" id="address-text" name="resaddress"> {{ Auth::user()->address }} </textarea>
          </div>
          <div class="form-group">
            <label for="res-coord" class="col-form-label">Country:</label>
            <select class="form-control" id="country" name="country">
                @if($countries)
                @foreach($countries as $country)
                <option value="{{$country->name}}" @if (Auth::user()->country == $country->name) selected="selected" @endif>
                  {{ $country->name}}
                </option>
                @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label for="paymentplan" class="col-form-label">Payment Plan:</label>
            <select class="form-control" id="paymentplan" name="paymentplan">
              <option value="commission" @if (Auth::user()->paymentmethod == 'commission') selected="selected" @endif>Commission</option>
              <option value="subscription" @if (Auth::user()->paymentmethod == 'subscription') selected="selected" @endif>Subscription</option>
            </select>
          </div>
          <div class="form-group">
            <label for="res-password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="res-password" name="password">
          </div>
          <div class="form-group">
            <label for="res-password2" class="col-form-label">Repeat Password:</label>
            <input type="password" class="form-control" id="res-password2" name="password2">
          </div>

          <hr>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Restaurant</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
