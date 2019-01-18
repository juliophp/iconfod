@extends('layouts.pickyres')



@section('banner')
<div class="page-wrapper">
  <div class="breadcrumb">
      <div class="container">
          <ul>
              <li><a href="#" class="active">Home</a></li>
              <li><a href="#">Restaurants</a></li>
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
                    <form method="POST" action="{{ route('restaurant.register.submit') }}" aria-label="{{ __('Register') }}">
                        @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">{{ __('Restaurant Name') }}</label>
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Restaurant Name" required autofocus>
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
                            <label for="phone1">{{ __('Phone Number') }}</label>
                            <input type="tel" id="phone1" type="phone" class="form-control{{ $errors->has('phone1') ? ' is-invalid' : '' }}" name="phone1" value="{{ old('phone1') }}" required>
                            <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                            @if ($errors->has('phone1'))
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $errors->first('phone1') }}</small>
                                </span>
                            @endif
                          </div>
                          <div class="form-group">
                              <label for="openingtime">{{ __('Opening Hours') }}</label>
                              <input type="time" id="openingtime" class="form-control{{ $errors->has('openingtime') ? ' is-invalid' : '' }}" name="openingtime" value="{{ old('openingtime') }}" required>
                              <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                              @if ($errors->has('openingtime'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('openingtime') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="closingtime">{{ __('Closing Hours') }}</label>
                              <input type="time" id="closingtime" class="form-control{{ $errors->has('closingtime') ? ' is-invalid' : '' }}" name="closingtime" value="{{ old('closingtime') }}" required>
                              <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                              @if ($errors->has('closingtime'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('closingtime') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="menu">{{ __('Popular Menu') }}</label>
                              <input type="text" id="menu" class="form-control{{ $errors->has('menu') ? ' is-invalid' : '' }}" name="menu" value="{{ old('menu') }}" required>
                              <small class="form-text text-muted">List five of your most popular menu seperated by comma.</small>
                              @if ($errors->has('menu'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('menu') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="deliverytime">{{ __('Average Delivery Time') }}</label>
                              <input type="text" id="deliverytime" class="form-control{{ $errors->has('deliverytime') ? ' is-invalid' : '' }}" name="deliverytime" value="{{ old('deliverytime') }}" required>
                              <small class="form-text text-muted">List five of your most popular menu seperated by comma.</small>
                              @if ($errors->has('deliverytime'))
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $errors->first('deliverytime') }}</small>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="address">{{ __('Address') }}</label>
                              <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" rows="3" required>{{ old('address') }}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="country">{{ __('Country') }}</label>
                              <select class="form-control" name="country" id="country">
                                @foreach($countries as $country)
                                <option value="{{$country->name}}">{{ $country->name}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="paymentplan" class="col-form-label">Preferred Payment Plan:</label>
                            <select class="form-control" id="paymentplan" name="paymentplan">
                              <option value="commission">Commission</option>
                              <option value="subscription">Subscription</option>
                            </select>
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
              <hr><img src="{{asset('images/img.png')}}" alt="" class="img-fluid"><hr>
              <p>Once you"re registered, you can:</p>
              <ul class="list-check list-unstyled">
                  <li>Manage Menus.</li>
                  <li>Manage Orders</li>
                  <li>View Reservations</li>
                  <li>Enter Competition</li>
                  <li>Post Discount Vouchers</li>
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
