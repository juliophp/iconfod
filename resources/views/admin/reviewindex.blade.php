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
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action active">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>
            <form action="{{ route('review.filter')}}" method="post">
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
                <th scope="col">Review ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Rating</th>
                <th scope="col">Restaurant</th>
                <th scope="col" width="40%">Comments</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($rev as $review)
              @if($id && $id != $review->restaurant->id)
              @else
              <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->user->name}}</td>
                <td>{{$review->star}}</td>
                <td>{{$review->restaurant->name}}</td>
                <td>{{$review->comment}}</td>
                <td><a  href="#" class="btn btn-sm btn-success btn-block">View / Update</a></td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
</section>

@endsection
