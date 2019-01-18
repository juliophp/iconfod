<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{ asset('styles/css/simple-line-icons.css') }}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{ asset('styles/css/themify-icons.css') }}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{ asset('styles/css/set1.css') }}">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="{{ asset('styles/css/swiper.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css/magnific-popup.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('styles/css/style.css') }}">
</head>
<body>
    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/">Icon Food</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-menu"></span>
            </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                              <!-- Authentication Links -->
                              @guest
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('restaurant.login') }}">Login</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('restaurant.register') }}" >Register</a>
                                </li>
                              @else
                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="icon-arrow-down"></span>
                                  </a>

                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">Logout
                                            </a>
                                            <a class="dropdown-item" href="{{ route('restaurant.update', Auth::user()->id ) }}">
                                              Update Profile
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                            </form>
                                  </div>

                              </li>

                              @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//END HEADER -->
    @yield('content')

    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_content"></div>
        </div>
    </div>
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('styles/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('styles/js/popper.min.js')}}"></script>
    <script src="{{asset('styles/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/ajax.js')}}"></script>
    <!-- jQuery, Bootstrap JS. -->


</body>

</html>
