@extends('master')
@section('title','Login')
@section('content')
  <div class="col-md-4 col-md-offset-4 main-panel">
    <div class="col-md-12 login-area">
      <div class="col-md-12 login-header">
        <h3>Sign In</h3>
      </div>
      <div class="col-md-12 login-body">
        @php
          $status = Session::get('status');

          if ($status) {
            echo
            "
              <div class='alert alert-success' id='alert'>
              <h4 style='text-align:center'>$status</h4>
              </div>
            ";
            Session::put('status','');
          }
        @endphp
        <form class="" action="{{ route('memberLogin') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('member_email')? 'has-error':'' }}">
            <label for="email">Email</label>
            <input type="email" name="member_email" value="{{ old('member_email') }}" class="form-control" id="member_email" placeholder="Email ID">

            @if ($errors->has('member_email'))
              <div class="error-msg">
                {{ $errors->first('member_email') }}
              </div>
            @endif
          </div>
          <div class="form-group {{ $errors->has('member_password')? 'has-error':'' }}">
            <label for="password">Password</label>
            <input type="password" name="member_password" class="form-control" id="member_password" placeholder="Password">
            @if ($errors->has('member_password'))
              <div class="error-msg">
                {{ $errors->first('member_password') }}
              </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary login-btn">Sign In <i class="fa fa-sign-in"></i></button>
          <div class="pull-right sign-in-link">
            <span>Forget password?&nbsp;</span>
            <a href="{{ URL::to('/reset-password') }}" class="pull-right">Reset</a><br>
            <span>New member?&nbsp;</span>
            <a href="{{ URL::to('/register') }}" class="pull-right">Sign Up</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
