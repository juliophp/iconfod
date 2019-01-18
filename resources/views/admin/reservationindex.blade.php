@extends('layouts.app')

@section('content')
<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/admin')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('admin.menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('admin.order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action">Chefs</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action active">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>
            <form action="{{ route('reservation.filter')}}" method="post">
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
                <th scope="col">Reservation ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Table/Sit</th>
                <th scope="col">Time</th>
                <th scope="col">Restaurant</th>
                <th scope="col">Duration</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($reserve as $reservation)

              <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->user->name}}</td>
                <td>{{$reservation->table}}</td>
                <td>{{$reservation->date ." " . $reservation->time}}</td>
                <td>{{$reservation->restaurant->name }}</td>
                <td>{{ $reservation->duration }} <small>Hours</small></td>
                <td><a  href="#" class="btn btn-sm btn-success btn-block">View / Update</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
</section>

@endsection
