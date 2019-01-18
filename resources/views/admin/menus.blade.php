@extends('layouts.app')

@section('content')


<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modal_content"></div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                    <input type="hidden" id="delete_token"/>
                    <input type="hidden" id="delete_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                            onclick="ajaxDelete('{{url('menu/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())">
                        Delete
                    </button>
                </div>
            </div>
        </div>
      </div>



<section class="main-block light-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="{{ url('/admin')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('admin.menu')}}" class="list-group-item list-group-item-action active">Menu</a>
            <a href="{{ route('admin.order')}}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('admin.chef')}}" class="list-group-item list-group-item-action">Chefs</a>
            <a href="{{ route('admin.reservation')}}" class="list-group-item list-group-item-action">Reservations</a>
            <a href="{{ route('admin.review')}}" class="list-group-item list-group-item-action">Reviews</a>
            <a href="{{ route('admin.customer')}}" class="list-group-item list-group-item-action">Customers</a>
            <a href="{{ route('admin.competition')}}" class="list-group-item list-group-item-action">Competition</a>
            <a href="{{ route('admin.advert')}}" class="list-group-item list-group-item-action">Adverts</a>
            <form action="{{ route('menu.filter')}}" method="post">
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
                <th scope="col">Menu</th>
                <th scope="col">Image</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @if($menus && $menus->count() > 0)
            <tbody>
              @foreach($menus as $menu)
              <tr>
                <td>{{$menu->menuname}}</td>
                <td><img src="{{ asset('storage/'.$menu->image) }}" alt="img" height="30" width="30"></td>
                <td>{{str_limit($menu->ingredients, 32)}}</td>
                <td>{{$menu->price}}</td>
                <td>{{str_limit($menu->description, 32)}}</td>

                <td>
                  <a class="btn btn-sm btn-warning" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('restaurant/menu/'.$menu->id)}}">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-sm btn-danger" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$menu->id}}"
                       data-token="{{csrf_token()}}">
                        Delete
                    </a></td>
              </tr>
              @endforeach
            </tbody>
            @endif
          </table>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#menuModal">Add Menu</button>
          <hr>
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
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('menu.create')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="menuname" class="col-form-label">Menu name:</label>
            <input type="text" class="form-control" id="menuname" name="menuname">
            @if ($errors->has('menuname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('menuname') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="images" class="col-form-label">Images:</label>
            <input type="file" class="form-control" id="images" name="images">
            @if ($errors->has('images'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('images') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">Price:</label>
            <input type="decimal" class="form-control" id="price" name="price">
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="desc" class="col-form-label">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="ing" class="col-form-label">Ingredients:</label>
            <textarea class="form-control" id="ingredients" name="ingredients"></textarea>
            @if ($errors->has('ingredients'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ingredients') }}</strong>
                </span>
            @endif
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
