<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <!-- Endless -->
  <link href="css/endless.css" rel="stylesheet">

  </head>

  <body>
  <div class="login-wrapper">
    <div class="text-center">
      <h2 class="fadeInUp animation-delay8" style="font-weight:bold">
        <span class="text-success">KNT</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
      </h2>
    </div>
    <div class="login-widget animation-delay1">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <div class="pull-left">
            <i class="fa fa-lock fa-lg"></i> Login
          </div>
        </div>
        <div class="panel-body">
          <form class="form-login" action="index.php?/admin/doLogin" method="post">
            <div class="form-group">
              <label>Username</label>
              <input name="account" type="text" placeholder="Username" class="form-control input-sm bounceIn animation-delay2" >
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4">
            </div>

            <div class="seperator"></div>

            <hr/>

            <button type="submit" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right"><i class="fa fa-sign-in"></i> Sign in</button>
          </form>
        </div>
      </div><!-- /panel -->
    </div><!-- /login-widget -->
  </div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Jquery -->
  <script src="js/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- Modernizr -->
  <script src='js/modernizr.min.js'></script>

    <!-- Pace -->
  <script src='js/pace.min.js'></script>

  <!-- Popup Overlay -->
  <script src='js/jquery.popupoverlay.min.js'></script>

    <!-- Slimscroll -->
  <script src='js/jquery.slimscroll.min.js'></script>

  <!-- Cookie -->
  <script src='js/jquery.cookie.min.js'></script>

  <!-- Endless -->
  <script src="js/endless/endless.js"></script>
  </body>
</html>
