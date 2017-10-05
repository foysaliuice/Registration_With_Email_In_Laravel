<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class PasswordResetController extends Controller
{
  public function resetForm(){
    return view('pages.reset-password');
  }

  public function reset(request $request){
    $this->validate($request,[
      'member_email'=>'required',
    ]);

    $reset_email = $request->get('member_email');
    $reset_data = DB::table('members')
                      ->select('*')
                      ->where('member_email',$reset_email)
                      ->first();

    if ($reset_data) {
      Session::flash('status','Password reset email send to your mail');
      return Redirect::to('/reset-password');
    }else {
      Session::flash('status','Email not registered');
      return Redirect::to('/reset-password');
    }
  }
}
