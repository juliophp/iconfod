<?php

namespace App\Http\Controllers;
use Auth;
use App;
use App\Menu;
use App\Cart;
use App\Chef;
use App\Restaurant;
Use Validator;
Use Session;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('chefindex', ['chefs' => Chef::where('restaurant_id', Auth::user()->id)->get()]);
    }

    public function adminindex($id)
    {
      if($id)
        $chefs = Chef::where('restaurant_id', $id)->get();
      else
        {
          $chefs =Chef::all();
          $id=null;
        }
      return view('admin.chefindex', ['chefs' => $chefs, 'id' => $id]);

    }
    public function show($id)
    {
    }
    public function create(Request $request)
    {
        $chef = new Chef();
        $chef->restaurant_id = Auth::user()->id;
        $chef->chefname = $request->chefname;
        $chef->chefdesc = $request->chefdesc;
        if ($request->hasFile('chefavi'))
        {
          $image = $request->file('chefavi');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $imagePath = $destinationPath. "/".  $name;
          $image->move($destinationPath, $name);
          $chef->chefavi = $name;
        }

      $chef->save();

      return redirect()->route('chef');

    }
}
