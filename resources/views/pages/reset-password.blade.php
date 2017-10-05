@extends('master')
@section('title','Reset-password')
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
        <form class="" action="{{ route('reset') }}" method="post">
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
          <button type="submit" class="btn btn-primary login-btn">Reset password <i class="fa fa-sign-in"></i></button>
          <div class="pull-right sign-in-link">
            <span>Already registered?&nbsp;</span>
            <a href="{{ URL::to('/login') }}" class="pull-right">Sign In</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
