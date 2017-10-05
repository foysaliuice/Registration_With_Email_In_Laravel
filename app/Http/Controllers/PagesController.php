<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
session_start();
class PagesController extends Controller
{
    public function authCheck(){
      $member_id = Session::get('id');
      if ($member_id ==NULL) {
        return Redirect::to('/login')->send();
      }
    }
    //For redirect dashboard
    public function dashboard(){
      $this->authCheck();
      $member_email = Session::get('member_email');
      $file = DB::table('Files')
                  ->select('*')
                  ->where('member_email',$member_email)
                  ->get();
      return view('pages.dashboard')->with('file',$file);
    }
    //For root page
    public function index(){
      return view('pages.index');
    }
    //For registration form
    public function registrationForm(){
      return view('pages.registration');
    }

    //For Profile page
    public function profile(){
      $this->authCheck();
      $member_id = Session::get('id');
      $member_data = DB::table('members')
                            ->select('*')
                            ->where('id',$member_id)
                            ->get();

      return view('pages.profile')->with('member_data',$member_data);
    }
}
