@extends('layouts.pickyhome')

@section('banner')
<div class="page-wrapper">
  <div class="breadcrumb">
      <div class="container">
          <ul>
              <li><a href="#" class="active">Home</a></li>
              <li>Register</li>
          </ul>
      </div>
  </div>
  <section class="contact-page inner-page">
      <div class="container">
        <div class="row">
          <!-- REGISTER -->
          <div class="col-md-8">
              <div class="widget">
                  <div class="widget-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">{{ __('Username') }}</label>
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  required autofocus>
                              <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small>
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('name') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="email">{{ __('E-Mail Address') }}</label>
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                              <small class="form-text text-muted">We"ll never share your email with anyone else. </small>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('email') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('password') }}</small>
                                </span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="password-confirmation">{{ __('Repeat Password') }}</label>
                            <input type="password" id="password-confirmation" class="form-control" name="password_confirmation"  required>

                          </div>
                          <div class="form-group">
                            <label for="phone">{{ __('Phone Number') }}</label>
                            <input type="tel" id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('phone') }}</small>
                                </span>
                            @endif
                          </div>
                          <div class="form-group">
                              <label for="address">{{ __('Address') }}</label>
                              <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                          </div>
                          <p>
                              <button type="submit" class="btn theme-btn">Submit</button>
                          </p>
                      </form>
                  </div>
              </div>
              <!-- end: Widget -->
          </div>
          <!-- /REGISTER -->
          <!-- WHY? -->
          <div class="col-md-4">

              <h4>Registration is fast, easy, and free.</h4>
              <hr>
              <img src="{{asset('images/img.png')}}" alt="" class="img-fluid">
              <hr>
              <p>Once you"re registered, you can:</p>
              <ul class="list-check list-unstyled">
                  <li>Order foods.</li>
                  <li>Vote Restaurant Menu</li>
                  <li>Make Table Reservations</li>
                  <li>Get Discounts</li>
              </ul>
              <hr>
              <p></p>
              <h4 class="m-t-20">Contact Customer Support</h4>
              <p> If you"re looking for more help or have a question to ask, please </p>
              <p> <a href="contact.html" class="btn theme-btn m-t-15">contact us</a> </p>
          </div>
          <!-- /WHY? -->
        </div>

@endsection

@section('popularblock')
</div>
</section>
</div>
@endsection
