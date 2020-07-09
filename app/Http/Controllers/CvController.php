<?php

namespace App\Http\Controllers;

// Custom Models
use App\Cv;
use App\Education;
use App\Project;
use App\Skill;
// end of Custom Models

// Built-in classes
use Faker\Provider\Image;
use Auth;
use DB;
use File;
// end of Built-in classes

use Illuminate\Http\Request;

class CvController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $this->middleware('admin');
    if(Auth::user()->is_admin == 0) {
      return redirect('/');
    }

    $cvs = Cv::latest()->paginate(1);

    return view('admin.cv.index', compact('cvs'));
  }

  public function create()
  {
    $uid = Auth::check() ? Auth::user()->id : 0;
    $user_cv = Cv::where('user_id', $uid)->first();

    if (!$user_cv == null) {
      return redirect()->route('cv.show' , ['cv' => $uid])->with('status_cv_exists',
      'Your Cv already exists. If you want to edit your Cv <a href="'.route('cv.edit',
      ['cv' => $uid]).'"><b style="font-size: 16px;">Click here</b></a>!');
    }
    return view('cv.create');
  }

  public function store(Request $request)
  {
    $usid = Auth::check() ? Auth::user()->id : 0;



    if ($usid != $request->uid) {
      return redirect()->route('cv.create')->with('hack', 'Trying to hack ?? 	<span style="font-size: 20px;">&#129315;</span> Don\'t you know that we are tracking you. And we are on our way <span style="font-size: 20px;">&#128520;</span>');
    }

    $messages = [
      'required' => 'The <b><u>:attribute</u></b> field must be filled.'
    ];

    $request->validate([
      'name' => ['required', 'string'],
      'address' => ['required', 'string'],
      'email' => 'required',
      'mobile' => ['required', 'string'],
      'image' => 'required',
      'carObj' => 'required'
    ], $messages);

    // Personal Info
    $uid = $request->uid;
    $name = $request->name;
    $address = $request->address;
    $email = $request->email;
    $mobile = $request->mobile;
    $carObj = $request->carObj;


    // Image
    if (isset($request->image)) {
      $image_name = time().'.'.$request->image->extension();
      $request->image->move(public_path('images'), $image_name);
    } else {
      return redirect()->route('cv.create')->with('status', 'Image field is empty. You have to provide an image.');
    }

    // Project
    $projName = $request->projname;
    $projDetails = $request->projdetails;

    // Education
    $degree = $request->eduName;
    $institution = $request->instName;
    $grade = $request->grade;
    $duration = $request->duration;

    // Skills
    $skillName = $request->skillName;
    $skillDetails = $request->skillDetails;

    Cv::create([
      'user_id' => $uid,
      'name' => $name,
      'address' => $address,
      'email' => $email,
      'mobile' => $mobile,
      'image' => $image_name,
      'carObj' => $carObj
    ]);

    for ($i = 0; $i < count($projName); $i++) {
      Project::create([
        'user_id' => $uid,
        'name' => $projName[$i],
        'details' => $projDetails[$i]
      ]);
    }

    for ($i = 0; $i < count($degree); $i++) {
      Education::create([
        'user_id' => $uid,
        'institution' => $institution[$i],
        'degree' => $degree[$i],
        'grade' => $grade[$i],
        'duration' => $duration[$i]
      ]);
    }

    for ($i = 0; $i < count($skillName); $i++) {
      Skill::create([
        'user_id' => $uid,
        'name' => $skillName[$i],
        'details' => $skillDetails[$i]
      ]);
    }

    return redirect()->route('cv.show', ['cv' => $uid])->with('status', 'Cv Added!');
  }

  public function show($uid=false)
  {
    $user = Auth::user();
    $userPersonalInfo = $user->cv;


    //dd($userPersonalInfo);
    if ($userPersonalInfo !=null) {
      if(!$userPersonalInfo->isCreator()){
        return redirect()->route('cv.show', [ 'cv' => Auth::user()->id ]);
      }
    } else {
      return redirect()->route('cv.show', [ 'cv' => Auth::user()->id ]);
    }
    $projInfo = $user->projects;
    $eduInfo = $user->educations;
    $skillInfo = $user->skills;

    return view('cv.show', compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));
  }

  public function edit($uid)
  {
    $user = Auth::user();
    $userPersonalInfo = $user->cv;


    //dd($userPersonalInfo);
    if ($userPersonalInfo !=null) {
      if(!$userPersonalInfo->isCreator()){
        return redirect()->route('cv.edit', [ 'cv' => Auth::user()->id ]);
      }
    } else {
      return redirect()->route('cv.edit', [ 'cv' => Auth::user()->id ]);
    }
    $projInfo = $user->projects;
    $eduInfo = $user->educations;
    $skillInfo = $user->skills;

    return view('cv.edit', compact('userPersonalInfo', 'projInfo', 'eduInfo', 'skillInfo'));
  }

  public function update(Request $request)
  {
    $usid = Auth::check() ? Auth::user()->id : 0;

    if ($usid != $request->uid) {
      return redirect()->route('cv.edit', ['cv' => Auth::user()->id])->with('hack', 'Trying to hack ?? 	<span style="font-size: 20px;">&#129315;</span> Don\'t you know that we are tracking you. And we are on our way <span style="font-size: 20px;">&#128520;</span>');
    }

    $uid = $request->uid;

    $messages = [
      'required' => 'The <b><u>:attribute</u></b> field must be filled.',
    ];

    $request->validate([
      'name' => ['required', 'string'],
      'address' => ['required', 'string'],
      'email' => 'required',
      'mobile' => ['required', 'string'],
      'carObj' => 'required'
    ], $messages);


    Cv::where('user_id', $uid)->delete();
    Project::where('user_id', $uid)->delete();
    Education::where('user_id', $uid)->delete();
    Skill::where('user_id', $uid)->delete();

    // Personal Info
    $name = $request->name;
    $address = $request->address;
    $email = $request->email;
    $mobile = $request->mobile;
    $carObj = $request->carObj;


    // Image

    if (isset($request->image)) {
      $usersImage = public_path("images/".$request->existingImage); // get previous image from folder
      if (File::exists($usersImage)) { // unlink or remove previous image from folder
        unlink($usersImage);
      }
      $image_name = time().'.'.$request->image->extension();
      $request->image->move(public_path('images'), $image_name);
    } else {
      $image_name = $request->existingImage;
    }

    // Project
    $projName = $request->projname;
    $projDetails = $request->projdetails;

    // Education
    $degree = $request->eduName;
    $institution = $request->instName;
    $grade = $request->grade;
    $duration = $request->duration;

    // Skills
    $skillName = $request->skillName;
    $skillDetails = $request->skillDetails;

    Cv::create([
      'user_id' => $uid,
      'name' => $name,
      'address' => $address,
      'email' => $email,
      'mobile' => $mobile,
      'image' => $image_name,
      'carObj' => $carObj
    ]);

    for ($i = 0; $i < count($projName); $i++) {
      Project::create([
        'user_id' => $uid,
        'name' => $projName[$i],
        'details' => $projDetails[$i]
      ]);
    }

    for ($i = 0; $i < count($degree); $i++) {
      Education::create([
        'user_id' => $uid,
        'institution' => $institution[$i],
        'degree' => $degree[$i],
        'grade' => $grade[$i],
        'duration' => $duration[$i]
      ]);
    }

    for ($i = 0; $i < count($skillName); $i++) {
      Skill::create([
        'user_id' => $uid,
        'name' => $skillName[$i],
        'details' => $skillDetails[$i]
      ]);
    }

    return redirect()->route('cv.show', ['cv' => $uid])->with('status', 'Cv Updated!');
  }

  public function destroy(Cv $cv)
  {

  }
}
