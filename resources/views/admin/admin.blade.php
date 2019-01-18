@extends('layouts.app')

@section('content')


<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/admin')}}" class="list-group-item list-group-item-action active">Dashboard</a>
            <a href="{{ route('admin.menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('admin.order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action">Chef</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>


          </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Admin's Dashboard</div>

                <div class="card-body">
                <div class="row">
                  <div class="alert alert-primary col-md-4 ml-1"  role="alert">
                    <h4 class="alert-heading">{{@count(App\Restaurant::all())}} Restaurants</h4>
                    <hr>
                    <p class="mb-0">There are {{@count(App\Restaurant::all())}} Restaurants in total , You have absolute control on all of them </p>
                  </div>
                  <div class="alert alert-success col-md-3 ml-1"  role="alert">
                    <h4 class="alert-heading">{{@count(App\Menu::all())}} Menus</h4>
                    <hr>
                    <p class="mb-0">There are {{@count(App\Menu::all())}} Menus added in total , You have absolute control on all menus </p>
                  </div>

                  <div class="alert alert-info col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Order::all())}} Orders</h4>
                    <hr>
                    <p class="mb-0">{{@count(App\Order::all())}} Orders have been created, You can only view as order will be created by customers and updated by the restaurant</p>
                  </div>

                </div>
                <div class="row">
                  <div class="alert alert-secondary col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Chef::all())}} Chefs</h4>
                    <hr>
                    <p class="mb-0">You can add update and delete chefs, There are currently {{@count(App\Chef::all())}} Chefs added </p>
                  </div>


                  <div class="alert alert-danger col-md-3 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Reservation::all())}} Reservations</h4>
                    <hr>
                    <p class="mb-0">Customers are allowed to make reservations but you as the restaurant can only view and not delete</p>
                  </div>

                  <div class="alert alert-dark col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\Review::all())}} Reviews</h4>
                    <hr>
                    <p class="mb-0">You can see your reviews and comments, but you can neither delete nor update them.</p>
                  </div>

                </div>
                <div class="row">
                  <div class="alert alert-warning col-md-4 ml-1" role="alert">
                    <h4 class="alert-heading">{{@count(App\User::all())}} Customers</h4>
                    <hr>
                    <p class="mb-0">You can only add and delete customers, There are currently {{@count(App\User::all())}} customers added </p>
                  </div>
                </div>




                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
