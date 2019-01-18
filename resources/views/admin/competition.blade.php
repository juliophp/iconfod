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
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customer</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action active">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>


          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Competition Name</th>
                <th scope="col" width="40%">Description</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
            @foreach($comp as $competition)
              <tr>
                <td>{{ $competition->id }}</td>
                <td>{{ $competition->competitionname }}</td>
                <td><small>{{ $competition->competitiondescription }}</small></td>
                <td><a  href="#" class="btn btn-sm btn-success btn-block">View / Update</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <hr>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCompetition">Add Competition</button>
          <br><br>
          @if(session('errors'))
          <div class="alert alert-info col-md-6">
          @foreach($errors->all() as $error)
            <small><li>{{ $error }}</li></small>
          @endforeach
          </div>
          @endif
        </div>
    </div>
</div>
</section>

@endsection

<div class="modal fade" id="addCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Competition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.competition.create')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="col-form-label">Competition name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="desc" class="col-form-label">Description:</label>
            <textarea class="form-control" id="desc" name="desc"></textarea>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add menu</button>
        </div>

        </form>
      </div>

    </div>
  </div>
</div>
