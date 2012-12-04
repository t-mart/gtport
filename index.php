<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include('bootstrap_head.html')?>
  </head>

  <body>

	<?php include('navbar.html') ?>

	<?php include('alert.php') ?>

    <div class="container">

      <div class="hero-unit">
        <h1>GT Port.</h1>
        <p>By Chip Cely, Tim Martin, and Phillip Smith</p>
      </div>

      <div class="row">
        <div class="span8">
          <h2>Login</h2>
          <?php include('login-form.php') ?>
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
