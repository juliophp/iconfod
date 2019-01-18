<?php

namespace App\Http\Controllers;
use Auth;
use App;
use App\Menu;
use App\Cart;
use App\Chef;
use App\Review;
use App\Restaurant;
Use Validator;
Use Session;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
        return view('reviewindex', ['rev' => Review::where('restaurant_id', Auth::user()->id)->get()]);

    }

    public function adminindex($id)
    {
      if($id)
        $rev = Review::where('restaurant_id', $id)->get();
      else
        {
          $rev = Review::all();
          $id=null;
        }
        return view('admin.reviewindex', ['rev' => $rev, 'id' => $id]);
    }


    public function show($id){

    }


    public function create(Request $request){

      if(Auth::user()){
        $rev = new Review();
        $rev->user_id = Auth::user()->id;
        $rev->restaurant_id = $request->restaurantid;
        $rev->star = $request->star;
        $rev->comment = $request->comment;

        $rev->save();
      }
      else{
        Session::flash('message', 'You need to be logged in to add reviews');
        return redirect()->route('login');
      }
      return redirect()->route('resprofile', $request->restaurantid);

    }

    public function update(Request $request, $id)
    {

    }
}
