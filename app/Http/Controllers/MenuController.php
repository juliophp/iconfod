<?php

namespace App\Http\Controllers;
use Auth;
use App;
use App\Menu;
use App\Cart;
use App\Restaurant;
Use Validator;
Use Session;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['menuSearch', 'showMenu', 'addToCart', 'getCart'] ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();
        $menu = Menu::where('restaurant_id',$user->id)->get();
        return view('menus')->with('menus',$menu);
    }

    public function adminindex($id)
    {
        if($id)
          $menu = Menu::where('restaurant_id', $id)->get();
          else
          {
            $menu = Menu::all();
            $id=null;
          }
        return view('admin.menus', ['menus' => $menu, 'id' => $id]);
    }

    public function menuSearch(Request $request)
    {
      $request->route('food');
      $menu = Menu::where('menuname', 'like', '%'.$request->input('food'))->get();
      return view('fsearch')->with('menus',$menu);
    }

    public function addToCart(Request $request, $id){
      if(!Auth::user())
      {
      Session::flash('message', 'You need to be logged in to place orders');
      return redirect()->route('login');
      }
      $menu = Menu::find($id);
      $oldCart =  Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($menu, $menu->id);
      Session::put('cart', $cart);
      return redirect()->route('resprofile', $menu->restaurant->id);
    }

    public function getCart(){
      $user = null;
      if(!Session::has('cart'))
        return view('cart');
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      if (Auth()->user())
        $user = Auth()->user();
      else
        return redirect()->route('login');


      return view('cart', ['user' => $user, 'menus' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function showMenu($id)
    {
      $menu = Menu::where('restaurant_id',$id)->get();
      return view('menu')->with('menus',$menu);
    }

    public function show($id){
      return view('form', ['menu' => Menu::find($id)]);
    }

    public function resindex(){

    }

    public function create(Request $request){

      $rules = [
              'menuname' => 'required',
              'images' => 'required',
              'ingredients' => 'required',
              'price' => 'required|numeric',
              'description' => 'required'
          ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
        //dd($validator->errors());
        return redirect('restaurant/menu')->with('errors', $validator->errors());
      $menu = new Menu();

      $menu->restaurant_id = Auth::user()->id;
      $menu->menuname = $request->menuname;
      $menu->price = $request->price;
      $menu->description = $request->description;
      $menu->ingredients = $request->ingredients;
      if ($request->hasFile('images')) {
      $image = $request->file('images');
      $name = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $imagePath = $destinationPath. "/".  $name;
      $image->move($destinationPath, $name);
      $menu->image = $name;
      } else { $menu->image = ""; }

      $menu->save();

      return redirect()->route('menu');

    }

    public function update(Request $request, $id)
    {
        $rules = [
                'menuname' => 'required',
                'images' => 'required',
                'ingredients' => 'required',
                'price' => 'required',
                'description' => 'required'
            ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
          return response()->json([
            'fail' => true,
            'errors' => $validator->errors()
            ]);

        $menu = Menu::find($id);

        $menu->menuname = $request->menuname;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->ingredients = $request->ingredients;
        if ($request->hasFile('images'))
        {
          $image = $request->file('images');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('storage');
          $imagePath = $destinationPath. "/".  $name;
          $image->move($destinationPath, $name);
          $menu->image = $name;
        }
        else { $menu->image = ""; }
        $menu->save();
        return response()->json([
                        'fail' => false,
                        'redirect_url' => url('/restaurant/menu')
                    ]);


    }
}
