@extends('master')
@section('title','Sign up')
@section('content')
  <div class="col-md-4 col-md-offset-4 main-panel">
    <div class="col-md-12 login-area">
      <div class="col-md-12 login-header">
        <h3>Sign Up</h3>
      </div>
      <div class="col-md-12 login-body">
        <form action="{{ route('registration') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('member_name'? 'has-error':'') }}">
            <label for="email">Member name</label>
            <input type="text" name="member_name"class="form-control" id="m_name" placeholder="Member name">

            @if($errors->has('member_name'))
              <div class="error-msg">
                {{ $errors->first('member_name') }}
              </div>
            @endif
          </div>
          <div class="form-group {{ $errors->has('member_email'? 'has-error':'') }}">
            <label for="password">Email</label>
            <input type="email" name="member_email" class="form-control" id="email" placeholder="Email ID">
            @if($errors->has('member_email'))
              <div class="error-msg">
                {{ $errors->first('member_email') }}
              </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary login-btn">Sign Up  <i class="fa fa-plus-square-o"></i></button>
          <div class="pull-right sign-in-link">
            <span>Already registered?&nbsp;</span>
            <a href="{{ URL::to('/login') }}" class="pull-right">Sign In</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
