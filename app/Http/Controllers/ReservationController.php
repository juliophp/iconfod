<?php

namespace App\Http\Controllers;
use Auth;
use App;
use App\Menu;
use App\Cart;
use App\Chef;
use App\Reservation;
use App\Restaurant;
Use Validator;
Use Session;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['create', 'update'] ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservationindex', ['res' => Reservation::where('restaurant_id', Auth::user()->id)->get()]);
    }

    public function adminindex($id)
    {
      if($id)
        $ress = Reservation::where('restaurant_id', $id)->get();
      else
        {
          $ress = Reservation::all();
          $id=null;
        }
        return view('admin.reservationindex', ['reserve' => $ress, 'id' => $id ]);
    }




    public function show($id){

    }


    public function create(Request $request){
      if(Auth::user())
      {
        $res = new Reservation();
        $res->user_id = Auth::user()->id;
        $res->restaurant_id = $request->restaurantid;
        $res->table = $request->table;
        $res->duration = $request->duration;
        $res->time = $request->time;
        $res->date = $request->date;
        $res->save();
      }else{
        Session::flash('message', 'You need to be logged in to perform this action');
        return redirect()->route('login');
      }

      return redirect()->route('resprofile', $request->restaurantid);

    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->menuname = $request->menuname;
        $menu->price = $request->price;
        $menu->description = $request->desc;
        $menu->ingredients = $request->ing;
        if ($request->hasFile('images')) {
        $image = $request->file('images');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $imagePath = $destinationPath. "/".  $name;
        $image->move($destinationPath, $name);
        $menu->image = $name;
        } else { $menu->image = ""; }
        $menu->save();
        return response()->json([
                        'fail' => false,
                        'redirect_url' => url('/restaurant/menu')
                    ]);


    }
}
