<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
session_start();

class AdminController extends Controller
{
    public function index() {
      return view('admin.index');
    }

    public function login() {
      return view('admin.auth.login');
    }


    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
