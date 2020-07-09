<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function index() {
      return view('admin.index');
    }

    public function login() {
      return view('admin.auth.login');
    }

    public function view_cv($id) {

      $user = User::findOrFail($id);
      $userPersonalInfo = $user->cv;
      $projInfo = $user->projects;
      $eduInfo = $user->educations;
      $skillInfo = $user->skills;

      return view('admin.cv.show', compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));
    }
}
