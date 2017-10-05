<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Member;
use Redirect;
use App\File;
use DB;
class MemberController extends Controller
{
    public function updateMember(request $request){
      $this->validate($request,[
        'member_name'=>'required',
        'member_email'=>'required',
        'member_phone'=>'required',
        'member_designation'=>'required',
        'member_address'=>'required',
      ]);

      $id = Session::get('id');

      $name = $request->member_name;
      $email = $request->member_email;
      $phone = $request->member_phone;
      $designation = $request->member_designation;
      $address = $request->member_address;

      if ($request->hasFile('member_image')) {
      $member_image = $request->member_image->getClientOriginalName();
      $request->member_image->storeAs('public/member-images',$member_image);
      }

      Member::where('id',$id)->update(['member_name'=>$name,'member_email'=>$email,'member_phone'=>$phone,'member_designation'=>$designation,'member_address'=>$address,'member_image'=>$member_image]);

      Session::flash('status','Profile updated');
      return Redirect::to('profile');
    }

    public function uploadFile(request $request){
      $this->validate($request,[
        'file_name'=>'required',
      ]);
      if ($request->hasFile('file_name')) {
      $file_name = $request->file_name->getClientOriginalName();
      $request->file_name->storeAs('public/uploaded-file',$file_name);
      }
      $email = Session::get('member_email');

      $file = array();

      $file['file_name'] = $file_name;
      $file['member_email'] = $email;

      DB::table('Files')->insert($file);
      Session::flash('status','File successfully uploaded.');

      return Redirect::to('dashboard');
    }
}
