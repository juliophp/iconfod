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
            <a href="{{ route('competition')}}" class="list-group-item list-group-item-action active">Competition</a>
            <a href="{{ route('advert')}}" class="list-group-item list-group-item-action">Adverts</a>


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
                <td>
                  <form action="{{ route('competition.update', $competition->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="rid" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-sm btn-primary"
                    @if(count(App\Competition::whereHas('restaurant', function($q)use($competition){
                      $q->where('competition_restaurant.restaurant_id', Auth::user()->id)
                        ->where('competition_restaurant.competition_id', $competition->id);
                    })->get())>0){{ 'disabled' }}
                    @endif >Enter competition</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <hr>
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
