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
            <a href="{{ route('chef')}}" class="list-group-item list-group-item-action active">Chefs</a>
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>

          </div>
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Chef ID</th>
                <th scope="col">Chef Name</th>
                <th scope="col" width="50%">Description</th>
                <th scope="col">Avatar</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($chefs as $chef)
              <tr>
                <td>{{$chef->id}}</td>
                <td>{{$chef->chefname}}</td>
                <td><small>{{str_limit($chef->chefdesc, 100)}}</small></td>
                <td><img src="{{ asset('/images/'.$chef->chefavi)}}" height="50" width="50"></td>
                <td><a  href="#" class="btn btn-sm btn-success btn-block">View / Update</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addChefModal">Add Chef</button>

        </div>
    </div>
</div>
</section>

<div class="modal fade" id="addChefModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Chef</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('chef.create')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="chefname" class="col-form-label">Chef name:</label>
            <input type="text" class="form-control" id="chefname" name="chefname">
          </div>
          <div class="form-group">
            <label for="chefavi" class="col-form-label">Chef Avatar:</label>
            <input type="file" class="form-control" id="chefavi" name="chefavi">
          </div>
          <div class="form-group">
            <label for="chefdesc" class="col-form-label">Description:</label>
            <textarea class="form-control" id="chefdesc" name="chefdesc"></textarea>
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

@endsection
