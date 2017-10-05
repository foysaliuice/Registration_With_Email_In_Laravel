<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();
class LoginController extends Controller
{

    public function auth_status(){
      $member_id = Session::get('id');
      if ($member_id !=NULL) {
        return Redirect::to('/dashboard')->send();
      }
    }
    //For login form
    public function loginForm(){
      $this->auth_status();
      return view('pages.login');
    }

    public function memberLogin(request $request){
      $this->validate($request,[
        'member_email' => 'required',
        'member_password' => 'required|min:6',
      ]);

      $member_email = $request->get('member_email');
      $member_password = $request->get('member_password');

      $member_info = DB::table('members')
                      ->select('*')
                      ->where('member_email',$member_email)
                      ->where('member_password',$member_password)
                      ->first();

        if($member_info) {
          if ($member_info->status == '1') {
            Session::put('id',$member_info->id);
            Session::put('member_name',$member_info->member_name);
            Session::put('member_email',$member_info->member_email);
            Session::put('member_image',$member_info->member_image);
            Session::put('created_at',$member_info->created_at);
          return Redirect::to('/dashboard');
        }else {
          Session::flash('status','Account not yet activate. Check email first.');
          return Redirect::to('/login');
        }
      }else {
        Session::flash('status','Email or password invalid!');
        return Redirect::to('/login');
      }
    }
    public function logout(){
      Session::flash('status','You are successfully logout.');
      Session::put('id','');
      return Redirect::to('/login');
    }
}
