<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  $menu = App\Menu::orderBy('created_at')->take(3)->get();
  $res = App\Restaurant::orderBy('created_at')->take(6)->get();
  return view('welcomepicky', ['menus' => $menu, 'restaurants' => $res ]); });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myorders', 'OrderController@showOrders')->name('orders');
Route::get('/search', 'MenuController@menuSearch')->name('menusearch');
Route::get('/restaurants', 'RestaurantController@index')->name('restaurants');
Route::get('/cart', 'MenuController@getCart')->name('cart.get');
Route::post('/cart', 'OrderController@create')->name('order.create');





Route::prefix('restaurant')->group(function() {
  Route::get('/advert', 'AdController@index')->name('advert');
  Route::get('/competition', 'RestaurantController@rescompindex')->name('competition');
  Route::patch('/competition/{competition}', 'RestaurantController@rescompupdate')->name('competition.update');


  Route::get('/login', 'Auth\RestaurantLoginController@showLoginForm')->name('restaurant.login');
  Route::get('/register', 'Auth\RestaurantRegisterController@showRegistrationForm')->name('restaurant.register');
  Route::post('/register', 'Auth\RestaurantRegisterController@register')->name('restaurant.register.submit');
  Route::patch('/{restaurant}', 'RestaurantController@update')->name('restaurant.update');
  Route::post('/login', 'Auth\RestaurantLoginController@login')->name('restaurant.login.submit');

  Route::get('/menu', 'MenuController@index')->name('menu');
  Route::post('/menu', 'MenuController@create')->name('menu.create');
  Route::get('/menu/{menu}', 'MenuController@show')->name('menu.show');
  Route::patch('/menu/{menu}', 'MenuController@update')->name('menu.update');


  Route::get('/chef', 'ChefController@index')->name('chef');
  Route::post('/chef', 'ChefController@create')->name('chef.create');

  Route::get('/reservations', 'ReservationController@index')->name('reservation');
  Route::post('/reservations', 'ReservationController@create')->name('reservation.create');

  Route::get('/review', 'ReviewController@index')->name('review');
  Route::post('/review', 'ReviewController@create')->name('review.create');


  Route::get('/order', 'OrderController@index')->name('order');
  Route::get('/order/{order}', 'OrderController@show')->name('order.show');
  Route::patch('/order/{order}', 'OrderController@update')->name('order.update');
  Route::get('/menu/addtocart/{id}', 'MenuController@addToCart')->name('cart.add');
  Route::get('/{restaurant}', 'RestaurantController@show')->name('resprofile');
  Route::get('/{restaurant}/menu', 'MenuController@showMenu')->name('restaurantmenu');





  Route::get('/', 'RestaurantController@resindex')->name('restaurant');

});


Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin');
  Route::get('/menus', 'AdminController@menu')->name('admin.menu');
  Route::post('/menus', 'AdminController@filtermenu')->name('menu.filter');
  Route::get('/orders', 'AdminController@order')->name('admin.order');
  Route::post('/orders', 'AdminController@filterorder')->name('order.filter');
  Route::get('/chefs', 'AdminController@chef')->name('admin.chef');
  Route::post('/chefs', 'AdminController@filterchef')->name('chef.filter');
  Route::get('/reservations', 'AdminController@reservation')->name('admin.reservation');
  Route::post('/reservations', 'AdminController@filterreservation')->name('reservation.filter');
  Route::get('/reviews', 'AdminController@review')->name('admin.review');
  Route::post('/reviews', 'AdminController@filterreview')->name('review.filter');
  Route::get('/customers', 'AdminController@customer')->name('admin.customer');
  Route::get('/competition', 'CompetitionController@index')->name('admin.competition');
  Route::post('/competition', 'CompetitionController@create')->name('admin.competition.create');

  Route::get('/advert', 'AdminController@advert')->name('admin.advert');










});
