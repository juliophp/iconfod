<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Restaurant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menu = Menu::orderBy('created_at')->take(3)->get();
        $res = Restaurant::orderBy('created_at')->take(6)->get();
        return view('welcomepicky', ['menus' => $menu], ['restaurants' => $res]);
    }
}
