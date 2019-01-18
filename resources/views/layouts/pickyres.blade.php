<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href=" {{ asset('css/animsition.min.css')}}" rel="stylesheet">
    <link href=" {{ asset('css/animate.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="home">
  <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="/"> <img class="img-rounded" src="{{ asset('images/food-picky-logo.png') }}" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('restaurant.login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('restaurant.register') }}">{{ __('Register') }}</a>
                          </li>

                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <!-- /.navbar -->
    </header>
    @yield('banner')
    @yield('popularblock')
    @yield('howitworks')
    @yield('featuredblock')
    @yield('appsection')
    <!-- start: FOOTER -->
    <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="{{ asset('images/food-picky-logo.png')}}" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                    <div class="col-xs-12 col-sm-2 about color-gray">
                        <h5>About Us</h5>
                        <ul>
                            <li><a href="#">About us</a> </li>
                            <li><a href="#">History</a> </li>
                            <li><a href="#">Our Team</a> </li>
                            <li><a href="#">We are hiring</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>How it Works</h5>
                        <ul>
                            <li><a href="#">Enter your location</a> </li>
                            <li><a href="#">Choose restaurant</a> </li>
                            <li><a href="#">Choose meal</a> </li>
                            <li><a href="#">Pay via credit card</a> </li>
                            <li><a href="#">Wait for delivery</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>Pages</h5>
                        <ul>
                            <li><a href="#">Search results page</a> </li>
                            <li><a href="#">User Sing Up Page</a> </li>
                            <li><a href="#">Pricing page</a> </li>
                            <li><a href="#">Make order</a> </li>
                            <li><a href="#">Add to cart</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                        <h5>Popular locations</h5>
                        <ul>
                            <li><a href="#">Sarajevo</a> </li>
                            <li><a href="#">Split</a> </li>
                            <li><a href="#">Tuzla</a> </li>
                            <li><a href="#">Sibenik</a> </li>
                            <li><a href="#">Zagreb</a> </li>
                            <li><a href="#">Brcko</a> </li>
                            <li><a href="#">Beograd</a> </li>
                            <li><a href="#">New York</a> </li>
                            <li><a href="#">Gradacac</a> </li>
                            <li><a href="#">Los Angeles</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="{{ asset('images/paypal.png')}}" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="{{ asset('images/mastercard.png')}}" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="{{ asset('images/maestro.png')}}" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="{{ asset('images/stripe.png')}}" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="{{ asset('images/bitcoin.png')}}" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Address</h5>
                            <p>Concept design of oline food order and deliveye,planned as restaurant directory</p>
                            <h5>Phone: <a href="tel:+080000012222">080 000012 222</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Addition informations</h5>
                            <p>Join the thousands of other restaurants who benefit from having their menus on TakeOff</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>
    <!-- end:Footer -->
  </div>
  <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" data-backdrop="static">
      <div class="modal-dialog" role="document">
          <div class="modal-content" id="modal_content"></div>
      </div>
  <!--/end:Site wrapper -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/animsition.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-slider.min.js')}}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('js/headroom.js') }}"></script>
    <script src="{{ asset('js/foodpicky.min.js') }}"></script>
</body>

</html>
