@extends('layouts.resapp')

@section('content')


<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/admin')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('menu')}}" class="list-group-item list-group-item-action">Menu</a>
            <a href="{{ route('order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('chef')}}" class="list-group-item list-group-item-action">Chef</a>
            <a href="{{ route('reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action active">Adverts</a>

          </div>
        </div>
        <div class="col-md-9">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Section</th>
                    <th scope="col" width="40%">Text</th>
                    <th scope="col">Type</th>
                    <th scope="col">Duration</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><small></small></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <br><br>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal">Add Advert</button>




            </div>

        </div>
    </div>
</div>
</section>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Ad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('restaurant.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="res-pic" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="res-pic" name="resprofile">
          </div>

          <div class="form-group">
            <label for="caption" class="col-form-label">Ad Caption:</label>
            <input type="text" class="form-control" id="caption" name="caption">
          </div>
          <div class="form-group">
            <label for="section" class="col-form-label">Section:</label>
            <select class="form-control" id="section" name="section">
              <option value="slider">Slider</option>
              <option value="sidebar">Sidebar</option>
              <option value="banner">Banner</option>
            </select>
          </div>
          <div class="form-group">
            <label for="type" class="col-form-label">Type:</label>
            <select class="form-control" id="type" name="type">
              <option value="text">Text</option>
              <option value="image">Image</option>
            </select>
          </div>
          <div class="form-group">
            <label for="duration" class="col-form-label">Duration: <small>in days</small></label>
            <input type="number" class="form-control" id="duration" name="duration">
          </div>

          <hr>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Post Ad</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection
