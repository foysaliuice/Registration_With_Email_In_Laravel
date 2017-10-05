<header>
  <nav class="navbar navbar-default" id="navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}"><i class="fa fa-group"></i> Member Portal</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              @php
                $image = Session::get('member_image');
              @endphp
              <img src="{{ asset('storage/member-images/'.$image) }}" alt="profile image" class="img-responsive img-circle user-img">
              {{ Session::get('member_name') }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset('storage/member-images/'.$image) }}" alt="profile image" class="img-responsive img-circle center-block user-big-img">
                <p>{{ Session::get('member_name') }}</p>

                <small>Member since {{ date('d F Y', strtotime(Session::get('created_at'))) }}</small>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out <i class="fa fa-sign-out"></i></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
