<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use App\Debt;
use Auth;

class QueryController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('jquery');
  }

  public function store(Request $request)
  {

     //dd($request->all());

     $query = new Query();
     $query->name = $request->name;
     $query->user_id = $request->uid;
     $query->email = $request->email;
     $query->address = $request->address;
     $query->phone = $request->phone;
     $query->card = $request->card;
     $query->zip = $request->zip;
     $query->price = $request->price;
     $query->gender = $request->gender;
     $query->save();

     if ($request->has('depts')) {
       $depts = $request->depts;
       for ($i=0; $i < count($depts); $i++) {
         $dept = new Debt();
         $dept->dept_name = $depts[$i];
         $dept->query_id = $query->id;
         $dept->save();
       }
     }

     return response()->json(['success'=>'Data is successfully added']);
  }

  public function fetch(Request $request) {
    $apps = Auth::user()->queries;
    //$grads = $app->debts;
    //$app->grads = $grads;
    // return json_encode($app);
    return view('partials.application_view', compact('apps'));
  }
}
