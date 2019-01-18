@extends('layouts.resapp')

@section('content')
<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/restaurant')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('chef')}}" class="list-group-item list-group-item-action">Chefs</a>
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action active">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>

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
                <th scope="col">Duration</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($res as $reservation)
              <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->user->name}}</td>
                <td>{{$reservation->table}}</td>
                <td>{{$reservation->date ." " . $reservation->time}}</td>
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
