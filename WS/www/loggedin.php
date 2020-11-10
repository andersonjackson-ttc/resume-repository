<?php
  #if no cookie is set, redirect user back to index.php
  if(!isset($_COOKIE['first_name'])) {
    require('../includes/'); #TODO login functions
    redirect_user();
  } else {
    $first_name = $_COOKIE['first_name'];
  }

  $page_title = "Logged In";
  include('../includes/header.html');
?>

<div class="row justify-content-center text-success">
  <h1 class="display-3">Login Successful</h1>
  <p>Hello, <?php {$first_name} ?>, you are now logged in. </p>
</div>

<div class="row justify-content-end pr-3 text-muted">
   <p><a href="logout.php">Logout</a></p>
</div>

<?php
  include('..includes/footer.html'); 
 ?>
