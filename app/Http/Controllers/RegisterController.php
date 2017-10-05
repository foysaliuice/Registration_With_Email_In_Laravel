<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Str;
use Session;
use Redirect;
use Mail;
use App\Mail\VerifyEmail;
class RegisterController extends Controller
{
    public function register(request $request){
      $this->validate($request,[
        'member_name' => 'required|string|max:255',
        'member_email' => 'required|string|email|max:255|unique:members',
        //'password' => 'required|string|min:6|confirmed',
      ]);

      $member = new Member;

      $member->member_name = $request->get('member_name');
      $member->member_email = $request->get('member_email');
      $member->member_password = Str::random(12);
      $member->verifyToken = Str::random(40);

      $member->save();
      Session::flash('status','Registered! Check email to activate your account.');
      $thisUser = Member::findOrFail($member->id);
      $this->sendEmail($thisUser);
      return Redirect::to('/login');
    }

    public function sendEmail($thisUser){
      Mail::to($thisUser['member_email'])->send(new VerifyEmail($thisUser));
    }

    public function sendEmailDone($member_email, $verifyToken){
      $member = Member::where(['member_email'=>$member_email, 'verifyToken'=>$verifyToken])->first();

      if ($member) {
        member::where(['member_email'=>$member_email, 'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);
        Session::flash('status','Account activate successfully.');
        return Redirect::to('login');
      }else {
        Session::flash('status','Account already activated.');
        return Redirect::to('login');
      }
    }
}
