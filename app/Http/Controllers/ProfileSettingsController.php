<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomProfile;
use App\Models\User;
use Auth;

class ProfileSettingsController extends Controller
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

  public function index(){
    try {
        $user = $this->getUserProfile();
    } catch (ModelNotFoundException $exception) {
        abort(404);
    }
    $data = [
        'user'         => $user
    ];
    return view('custom-profile.edit')->with($data);
  }
  public function getUserProfile()
  {
      $currentUser = Auth::user();
      return User::with('custom_profile')->whereid($currentUser->id)->firstOrFail();
  }
}
