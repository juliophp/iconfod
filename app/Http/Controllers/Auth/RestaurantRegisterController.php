<?php

namespace App\Http\Controllers\Auth;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RestaurantRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/restaurant';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        // $client = new Client();
        // $res = $client->get('http://restcountries.eu/rest/v2/all');
        // $data  = json_decode($res->getBody());
        return view('auth.res.register', ['countries' => $data = []]);
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Restaurant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'openingtime' => $data['openingtime'],
            'closingtime' => $data['closingtime'],
            'banner' => $data['menu'],
            'deliverytime' => $data['deliverytime'],
            'phone1' => $data['phone1'],
            'address' => $data['address'],
            'paymentmethod' => $data['paymentplan'],
            'country' => $data['country'],
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function update(){

    }
}
