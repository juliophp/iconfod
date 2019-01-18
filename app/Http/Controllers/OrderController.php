<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\User;
use App\Menu;
use Session;
use App;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant', ['except' => ['create', 'showOrders']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $allorders = Order::whereHas('menus', function($q){
        $q->where('menu_order.restaurantid', Auth::user()->id);
      })->get();
      $price = 0;
      return view('order', ['orders' => $allorders, 'price' => $price]);

    }
    public function adminindex($id)
    {
      if($id)
        $allorders = Order::whereHas('menus', function($q)use($id){
        $q->where('menu_order.restaurantid', $id);
      })->get();
      else
        {
          $allorders = Order::all();
          $id=null;
        }
      $price = 0;
      return view('admin.order', ['orders' => $allorders, 'price' => $price, 'id'=>$id]);

    }
    public function show($id){
      $order = Order::findorfail($id);
      $price = 0;
      $restname = $order->menus->first()->restaurant->name;
      return view('updateorder', ['order' => $order, 'price' => $price, 'restname' => $restname]);

    }
    public function showOrders(){
      if(Auth::user())
      {
        $allorders = Order::whereHas('menus', function($q){
          $q->where('menu_order.userid', Auth::user()->id);
        })->get();
      }

      return view('myorders', ['allorders' => $allorders]);
    }
    public function create(Request $request){
      $order = new Order();
      $order->deliveryaddress = $request->address;
      $order->user_id = Auth()->user()->id;
      $order->totalprice = $request->totalprice;
      $order->paymentmethod = $request->pmode;
      $order->save();
      foreach ($request->menuid as $menu) {
          $order->menus()->attach(
          [$menu =>
                    [
                      'restaurantid' => $request->restaurantid[$menu],
                      'userid' => $order->userid,
                      'quantity' => $request->quantity[$menu],
                      'price' => $request->quantity[$menu] * $request->menuprice[$menu]
                      ]
            ]);
        }
      Session::forget('cart');
      return redirect()->route('home');
    }
    public function showOrder($id){
      $order = Order::findorfail($id);
      return view('vieworder', ['order' => $order]);
    }
    public function update(Request $request, $id){
      if(Auth::user())
      {
        $order = Order::find($id);
        foreach($order->menus as $menu)
        {
          if($menu->restaurant->id != Auth::user()->id)
            continue;
          else
            $order->menus()->updateExistingPivot($menu->id, ['status' => $request->status]);
        }
        return redirect()->route('order');

      }

    }
}
