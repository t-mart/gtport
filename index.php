<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GT Port</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

	<?php include('navbar.html') ?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>GT Port.</h1>
        <p>By Chip Cely, Tim Martin, and Phillip Smith</p>
      </div>

      <div class="row">
        <div class="span8">
          <h2>Login</h2>
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <div class="controls">
                <input type="text" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox"> Remember me
                </label>
                <button type="submit" class="btn">Sign in</button>
              </div>
            </div>
          </form>
        </div>
        <div class="span4">
          <br>
          <br>
          <h2>Or create an account</h2>
          <h2><a href="create_account.php">Click Here</a></h2>
        </div>
      </div>
      <hr>

      <footer>
        <p>&copy; Chip Cely, Tim Martin, Phillip Smith</p>
        <p>Georgia Tech, Fall 2012, CS4400, Group 18</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
