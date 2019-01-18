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
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action">Chef</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action active">Adverts</a>

          </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Advert Dashboard</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
