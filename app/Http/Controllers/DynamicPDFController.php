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
      $userPersonalInfo = Cv::where('user_id', $uid)->first();
      if(!$userPersonalInfo->isCreator()){
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

    function pdf($uid)
    {
      $customer_data = $this->get_customer_data();
      $userPersonalInfo = Cv::where('user_id', $uid)->first();
      if(!$userPersonalInfo->isCreator()){
        abort(404);
      }
      $projInfo = Project::where('user_id', $uid)->get();
      $eduInfo = Education::where('user_id', $uid)->get();
      $skillInfo = Skill::where('user_id', $uid)->get();

      //dd($skillInfo);

      // $pdf = PDF::setOptions([
      //                 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
      //                 'logOutputFile' => storage_path('logs/log.htm'),
      //                 'tempDir' => storage_path('logs/')
      //             ])->loadView('dynamic_pdf', compact('customer_data'));
      //
      // return $pdf->download('order-'.Auth::user()->name.'.pdf');

      $pdf = PDF::setOptions([
                      'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                      'logOutputFile' => storage_path('logs/log.htm'),
                      'tempDir' => storage_path('logs/')
                  ])->loadView('dynamic_pdf1',  compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));

      return $pdf->download('order-'.Auth::user()->name.'.pdf');
    }

}
