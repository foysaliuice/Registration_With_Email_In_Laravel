<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account activation link</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
      .wrapper{
        background: #ccc;
        font-family:Raleway, 'sans serif';
        font-weight: 600;
      }
      .email-header{
        background: #3d7097;
        color: #fff;
        text-align: center;
        border-bottom: 3px solid #429CDE;
        padding: 2px 0;
      }
      .email-body{
        background: #fff;
        padding: 20px;
        text-align: center;
      }
      .main-panel{
        width: 80%;
        margin: 20px auto;
        box-shadow: 0px 2px 3px #345f7f;
        padding: 20px 0px;
      }
      .btn-lg{
        text-decoration: none;
        border: 1px solid #429CDE;
        padding: 10px;
        background: #429CDE;
        color: #fff;
      }
      .btn-lg:hover{
        background: #345f7f;
        border: 1px solid #345f7f;
      }
      hr {
        margin-top: 70px;
        margin-bottom: 20px;
      }
      #h4{
        margin-bottom: 70px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
          <div class="main-panel">
              <div class="email-header">
                <h1>Member Portal</h1>
              </div>
              <div class="email-body">
                <h2>Welcome, {{ $member->member_name }}</h2>
                <h4>Thank you for signing up!</h4>
                <h2>Your Login Email: {{ $member->member_email }}</h2>
                <h2>Your Login Password: {{ $member->member_password }}</h2>
                <h4 id="h4">Please verify Your Email Address by clicking the button below.</h4>
                <a href="{{ route('sendEmailDone',["member_email"=>$member->member_email,"verifyToken"=>$member->verifyToken]) }}" class="btn-lg">Confirm my account</a>
                  <hr>
                  <div class="footer">
                    <h5>Your's, Member Portal Team</h5>
                  </div>
              </div>
          </div>
    </div>
  </body>
</html>
