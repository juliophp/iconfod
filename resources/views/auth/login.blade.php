@extends('layouts.pickyhome')

@section('banner')
<div class="page-wrapper">
  <div class="breadcrumb">
      <div class="container">
          <ul>
              <li><a href="#" class="active">Home</a></li>
              <li>Log In</li>
          </ul>
      </div>
  </div>
  <section class="contact-page inner-page">
      <div class="container">
        @if(Session::has('message'))
        <small><p class="alert alert-info col-md-8">{{Session::get('message')}}</p></small>
        @endif
        <div class="row">
          <!-- REGISTER -->
          <div class="col-md-8">
            <div class="widget">
                <div class="widget-body">
                  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Restaurant Login') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('email') }}</small>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('password') }}</small>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn theme-btn">
                                  {{ __('Login') }}
                              </button>

                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  {{ __('Forgot Your Password?') }}
                              </a>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
            <!-- end: Widget -->
        </div>
        <!-- /REGISTER -->
        <!-- WHY? -->
        <div class="col-md-4">
            <h4>Log in</h4>
            <p>Once you"re registered, you can:</p>
            <ul class="list-check list-unstyled">
                <li>Order foods.</li>
                <li>Vote Restaurant Menu</li>
                <li>Make Table Reservations</li>
                <li>Get Discounts</li>
            </ul>
            <hr>
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
