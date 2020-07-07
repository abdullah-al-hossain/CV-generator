<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
session_start();

class AdminController extends Controller
{

    public function __construct()
    {
      //$this->middleware('admin');
    }

    public function index() {
      return view('admin.index');
    }

    public function login() {
      if(Auth::check()) {
        if(auth()->user()->is_admin == 1){
          return redirect()->route('admin.index');
        } else
          return redirect()->route('home');
      }

      return view('admin.auth.login');
    }


    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
