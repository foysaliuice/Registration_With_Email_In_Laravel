@extends('master')
@section('title','')
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
        <div class="panel panel-default table-responsive">
          <div class="panel-heading">Member Dashboard
              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#uploadModal" data-backdrop="static" data-keyboard="false">Upload new file</button>
              @include('inc/uploadmodel')
          </div>
          <div class="panel-body">
            <table class="table table-bordered table-hover table-responsive">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Document name</th>
                  <th>Doucment type</th>
                  <th>Upload date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($file as $row)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->file_name }}</td>
                    <td>xslx</td>
                    <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
                    <td>
                      <a href=""><i class="fa fa-eye"></i></a>
                      <a href=""><i class="fa fa-edit"></i></a>
                      <a href=""><i class="fa fa-crosshairs"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
