<div class="modal-header">
    <h5 class="modal-title">{{isset($menu)?'Edit':'New'}} Menu</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
<form action="{{ route('menu.update', $menu->id)}}" method="POST" id="frm" enctype="multipart/form-data">
  @method('patch')
  @csrf
  <div class="form-group row">
      <label for="menuname" class="col-sm-4 col-form-label">{{ __('Menu Name') }}</label>

      <div class="col-md-12">
          <input id="menuname" type="text" class="form-control{{ $errors->has('menuname') ? ' is-invalid' : '' }}" name="menuname" value="{{ old('menuname', $menu->menuname) }}" required autofocus>

          @if ($errors->has('menuname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('menuname') }}</strong>
              </span>
          @endif
      </div>
  </div>
  <div class="form-group row">
      <label for="price" class="col-sm-4 col-form-label">{{ __('Price') }}</label>

      <div class="col-md-12">
          <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $menu->price) }}" required autofocus>

          @if ($errors->has('price'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group row">
      <label for="images" class="col-sm-4 col-form-label">{{ __('Images') }}</label>

      <div class="col-md-12">
          <input id="images" type="file" class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" name="images"  autofocus>

          @if ($errors->has('images'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('images') }}</strong>
              </span>
          @endif
      </div>
  </div>
  <div class="form-group row">
      <label for="desc" class="col-sm-4 col-form-label">{{ __('Description') }}</label>

      <div class="col-md-12">
        <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  required autofocus>{{ old('description', $menu->description) }}</textarea>

          @if ($errors->has('description'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
  </div>
  <div class="form-group row">
      <label for="ingredients" class="col-sm-4 col-form-label">{{ __('Ingredients') }}</label>

      <div class="col-md-12">
          <textarea id="ingredients" type="text" class="form-control{{ $errors->has('ingredients') ? ' is-invalid' : '' }}" name="ingredients"  required autofocus>{{ old('ingredients', $menu->ingredients) }}</textarea>

          @if ($errors->has('ingredients'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('ingredients') }}</strong>
              </span>
          @endif
      </div>
  </div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
</div>



</form>
