<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use Validator;
use App\Restaurant;

class CompetitionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['resindex']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comp = Competition::all();
      return view('admin.competition', ['comp' => $comp]);
    }


    public function resindex()
    {
      $comp = Competition::all();
      return view('competition', ['comp' => $comp]);
    }

    public function create(Request $request)
    {
      $rules = [
              'name' => 'required',
              'desc' => 'required'
          ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
        return redirect('admin/competition')->with('errors', $validator->errors());


      $competition = new Competition();
      $competition->competitionname = $request->name;
      $competition->competitiondescription = $request->desc;
      $competition->save();


      return redirect()->route('admin.competition');
    }


    public function update($rid, $id)
    {
      $comp = Competition::find($id);
      $comp->restaurant()->attach([$rid => ['vote' =>  0]]);

      return redirect()->route('competition');
    }
}
