<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">


  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post" action="{{ route('auth.save') }}">
      @csrf
       <!-- to display the return back error or success message -->
      @if(Session::get('success'))
      
          <div class="alert alert-success">
            {{Session::get('success')}}
            
          </div>

      @endif

      @if(Session::get('fail'))

          <div class="alert alert-danger">
            {{Session::get('fail')}}
          </div>
    
      @endif

         
        <h2 class="form-login-heading">Register now</h2>
        <div class="login-wrap"> 
          <input  type="text" name="name" class="form-control" placeholder="Name" autofocus>
          <span class="text-danger">@error('name'){{$message}} @enderror</span>
          <br>
          <input type="text" name="emails" class="form-control" placeholder="Email">
          <span class="text-danger">@error('email'){{$message}} @enderror</span>
          <br>
          <input  type="password" name="password" class="form-control" placeholder="Password">
          <span class="text-danger">@error('password'){{$message}} @enderror</span>
          <br>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>Register</button>
            <br>
            <div class="registration">
            Already have an account<br/>
            <a class="" href="{{ route('auth.login') }}">
              Login
            </a>
          </div>
          <hr>
          <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
