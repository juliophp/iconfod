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
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action active">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>

          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Review ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Rating</th>
                <th scope="col">Comments</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($rev as $review)
              <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->user->name}}</td>
                <td>{{$review->star}}</td>
                <td>{{$review->comment}}</td>
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
