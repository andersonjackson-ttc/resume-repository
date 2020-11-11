<?php
  #user is redirected here from login.php
  #if no session value is set, redirect user back to index.php

  session_start();

  if(!isset($_SESSION['agent']) OR ($_SESSION['agent'] != sha1($_SERVER['HTTP_USER_AGENT']) )) {
    require('../includes/login_functions.php'); 
    redirect_user();
  }

  $page_title = "Logged In";
  include('../includes/header.html');
?>

<div class="row justify-content-center text-success">
  <h1 class="display-3">Login Successful</h1>
  <p>Hello, <?php {$_SESSION['first_name']} ?>, you are now logged in. </p>
</div>

<div class="row justify-content-end pr-3 text-muted">
   <p><a href="logout.php">Logout</a></p>
</div>

<?php
  include('..includes/footer.html');
 ?>
