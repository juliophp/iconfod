<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ReservationController;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }
    public function menu()
    {
      $id = null;
      $menu = new MenuController();
      return $menu->adminindex($id);
    }
    public function order()
    {
        $id = null;
        $order = new OrderController;
        return $order->adminindex($id);
    }
    public function chef()
    {
        $id = null;
        $chef = new ChefController;
        return $chef->adminindex($id);
    }

    public function reservation()
    {
        $id = null;
        $res = new ReservationController;
        return $res->adminindex($id);
    }

    public function review()
    {
        $id = null;
        $rev = new ReviewController;
        return $rev->adminindex($id);
    }
    public function filtermenu(Request $request)
    {
        $id = $request->id;
        $menu = new MenuController;
        return $menu->adminindex($id);
    }
    public function filterorder(Request $request)
    {
        $id = $request->id;
        $order = new OrderController;
        return $order->adminindex($id);
    }
    public function filterchef(Request $request)
    {
        $id = $request->id;
        $chef = new ChefController;
        return $chef->adminindex($id);
    }
    public function filterreservation(Request $request)
    {
        $id = $request->id;
        $res = new ReservationController;
        return $res->adminindex($id);
    }
    public function filterreview(Request $request)
    {
        $id = $request->id;
        $rev = new ReviewController;
        return $rev->adminindex($id);
    }
    public function customer()
    {
        return view('admin.customer', ['users' => User::all()]);
    }


}
