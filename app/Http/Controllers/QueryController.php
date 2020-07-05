<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use App\Debt;

class QueryController extends Controller
{
  public function index() {
    return view('jquery');
  }

  public function store(Request $request)
  {

     //dd($request->all());

     $query = new Query();
     $query->name = $request->name;
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

  public function fetch() {
    $app = Query::latest()->first();
    $grads = $app->debts;
    $app->grads = $grads;
    return json_encode($app);
  }
}
