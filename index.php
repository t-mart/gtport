<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include('bootstrap_head.html')?>
  </head>

  <body>

	<?php include('navbar.html') ?>


    <div class="container">

	<?php include('alert.php') ?>
      <div class="hero-unit">
        <h1>GT Port.</h1>
        <p>By Chip Cely, Tim Martin, and Phillip Smith</p>
      </div>
      <div class="row">

<?php if (!isset($_SESSION['user_id'])) : ?>
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
<?php else : ?>
        <div class="span6 offset3 well">
        <p>Use the links in the navigation bar to use the system.</p>
        </div>
<?php endif; ?>
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
