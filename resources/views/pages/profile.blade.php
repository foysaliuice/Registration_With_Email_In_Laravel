@extends('master')
@section('title','profile')
@section('navbar')
  @include('inc/navbar')
@endsection
@section('content')
  <div class="col-md-12">
    <div class="col-md-10 col-md-offset-1 login-area">
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
        @php
          $image = Session::get('member_image');
        @endphp
        </script>
        <div class="panel panel-default table-responsive">
          <div class="panel-heading">Md. Foysal<sup>'</sup>s profile
              @foreach ($member_data as $row)
                <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Update profile</button>
                <!-- Button trigger modal -->
                @include('inc/model')
              @endforeach
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="col-md-4 profile-big-img">
                <img src="{{ asset('storage/member-images/'.$image) }}" alt="profile image" class="img-responsive center-block">
              </div>
              <div class="col-md-8 table-responsive cust-profile">
                <table class="table table-hover cust-table">
                  <tbody>
                    @foreach ($member_data as $row)
                      <tr>
                        <td>Member name</td>
                        <td>:</td>
                        <td>{{ $row->member_name }}</td>
                      </tr>
                      <tr>
                        <td>Member Email</td>
                        <td>:</td>
                        <td>{{ $row->member_email }}</td>
                      </tr>
                      <tr>
                        <td>Member phone</td>
                        <td>:</td>
                        <td>{{ $row->member_phone }}</td>
                      </tr>
                      <tr>
                        <td>Member designation</td>
                        <td>:</td>
                        <td>{{ $row->member_designation }}</td>
                      </tr>
                      <tr>
                        <td>Member address</td>
                        <td>:</td>
                        <td>{{ $row->member_address }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
