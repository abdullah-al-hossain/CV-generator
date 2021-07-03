<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Auth;
use App\Cv;
use App\Education;
use App\Project;
use App\Skill;

class DynamicPDFController extends Controller
{
  function index($uid)
  {
    $uid = Auth::user()->id;
    $userPersonalInfo = Cv::where('user_id', $uid)->first();
    if(Auth::user()->is_admin == 0 || $userPersonalInfo == null){
      abort(404);
    }
    $projInfo = Project::where('user_id', $uid)->get();
    $eduInfo = Education::where('user_id', $uid)->get();
    $skillInfo = Skill::where('user_id', $uid)->get();

    return view('dynamic_pdf1', compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));
  }

  function get_customer_data()
  {
    $customer_data = DB::table('tbl_customer')
    ->limit(10)
    ->get();

    return $customer_data;
  }

  // This function downloads the CV as a pdf
  function pdf($uid)
  {
    $customer_data = $this->get_customer_data();
    $userPersonalInfo = Cv::where('user_id', $uid)->first();

    if($userPersonalInfo == null){
      if(Auth::user()->is_admin == 0){
        abort(404);
      }
    }

    $projInfo = Project::where('user_id', $uid)->get();
    $eduInfo = Education::where('user_id', $uid)->get();
    $skillInfo = Skill::where('user_id', $uid)->get();


    $pdf = PDF::setOptions([
      'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
      'logOutputFile' => storage_path('logs/log.htm'),
      'tempDir' => storage_path('logs/')
      ])->loadView('dynamic_pdf1',  compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));

      return $pdf->stream('order-'.Auth::user()->name.'.pdf');
    }

  }
