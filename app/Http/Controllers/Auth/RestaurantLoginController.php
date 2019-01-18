<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;



class RestaurantLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest:restaurant');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.res.login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|min:6|exists:restaurants,email',
          'password' => 'required|min:6',
      ]);


      if(Auth::guard('restaurant')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
        $request->session()->flash('status', 'login was successful!');
        return redirect()->route('restaurant');
      }

      return redirect()->back()->withInput($request->only('email', 'remember'));
    }



}
