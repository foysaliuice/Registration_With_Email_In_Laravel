@extends('master')
@section('title','Member portal')
@section('content')
  <div class="col-md-6 col-md-offset-3 main-panel">
    <div class="col-md-12 login-area">
      <div class="col-md-12 login-header">
        <h3><i class="fa fa-group"></i> Member Portal</h3>
      </div>
      <div class="col-md-12 login-body">
          <div class="pull-right sign-in-link">
            <span>Already registered?&nbsp;</span>
            <a href="{{ URL::to('/login') }}">Sign In</a>
          </div>
          <div class="clearfix">

          </div>
          <div class="pull-right sign-in-link">
            <span>New member?&nbsp;</span>
            <a href="{{ URL::to('/register') }}">Sign Up</a>
          </div>
      </div>
    </div>
  </div>
@endsection
