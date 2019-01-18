<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Auth;
use App;
use App\Review;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['index', 'show']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $res = App\Restaurant::all();
      return view('restaurants')->with('restaurants', $res);
    }

    public function show($id){
      $i = 0;
      $restaurant = App\Restaurant::findOrFail($id);
      $chefs = App\Chef::where('restaurant_id', $id)->get();
      $menus = $restaurant->menu()->get();
      $rev = Review::where('restaurant_id', $id)->get();
      return view('profile', ['restaurant' => $restaurant, 'menus' => $menus, 'i' => $i, 'rev' => $rev, 'chefs' => $chefs]);

    }
    public function resindex(){
      $id = Auth::user()->id;
      // $client = new Client();
      // $res = $client->get('http://restcountries.eu/rest/v2/all');
      // $data  = json_decode($res->getBody());
      $result = App\Restaurant::find($id);
      return view('restaurant', ['countries' => $data=[]])->with('res',$result);
    }

    public function rescompindex(){
      $comp = new CompetitionController();
      return $comp->resindex();
    }

    public function rescompupdate(Request $request, $id){
      $comp = new CompetitionController();
      return $comp->update($request->rid, $id);
    }
    public function update(Request $request)
    {
      if($request->email)
      {
        $restaurant = App\Restaurant::find(Auth::user()->id);
        if ($request->hasFile('resprofile'))
        {
          $image = $request->file('resprofile');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $imagePath = $destinationPath. "/".  $name;
          $image->move($destinationPath, $name);
          $restaurant->profile = $name;
        }
        $id = Auth::user()->id;
        // $client = new Client();
        // $res = $client->get('http://restcountries.eu/rest/v2/all');
        // $data  = json_decode($res->getBody());

        $restaurant->name = $request->resname;
        $restaurant->banner = $request->resbanner;
        $restaurant->openingtime = $request->resopening;
        $restaurant->closingtime = $request->resclosing;
        $restaurant->deliverytime = $request->resdelivery;
        $restaurant->phone1 = $request->resphone1;
        $restaurant->phone2 = $request->resphone2;
        $restaurant->address = $request->resaddress;
        $restaurant->country = $request->country;
        $restaurant->paymentmethod = $request->paymentplan;
      }else{
        $restaurant = App\Restaurant::find(Auth::user()->id);
        $restaurant->openstatus = $request->openstatus;
      }
        $restaurant->save();
      return redirect()->route('restaurant', ['countries' => $data = [], 'res' => $restaurant ]);
    }
}
