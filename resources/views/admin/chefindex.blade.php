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
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action active">Chefs</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action ">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>

            <form action="{{ route('chef.filter')}}" method="post">
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
                <th scope="col">Chef ID</th>
                <th scope="col">Chef Name</th>
                <th scope="col" width="40%">Description</th>
                <th scope="col">Restaurant</th>
                <th scope="col">Avatar</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              @foreach($chefs as $chef)
                @if($id && $id != $chef->restaurant->id)
                @else
                <tr>
                  <td>{{$chef->id}}</td>
                  <td>{{$chef->chefname}}</td>
                  <td><small>{{str_limit($chef->chefdesc, 100)}}</small></td>
                  <td>{{$chef->restaurant->name}}</td>
                  <td><img src="{{ asset('/images/'.$chef->chefavi)}}" height="50" width="50"></td>
                  <td><a  href="#" class="btn btn-sm btn-success btn-block">View / Update</a></td>
                </tr>
                @endif
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
