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
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action active">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>


          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col" width="30%">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">E-mail</th>
                <th scope="col">No of orders</th>


              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone }}</td>
                <td>{{$user->email }}</td>
                <td>{{ @count($user->orders) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
</section>

@endsection
