<?php
  session_start();

  #if no session variable is set redirect user to index.php
  if(!isset($_SESSION['profile_id'])) {
    require('../includes/'); #TODO require login functions
    redirect_user();
  } else {
    $_SESSION = [];
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
  }


  $page_title = 'Logged Out';
  include('../includes/header.html');
 ?>

 <div class="row justify-content-center text-success">
   <h1 class="display-3">Logged Out</h1>
   <p>You are now logged out</p>
 </div>

 <?php
   include('..includes/footer.html');
  ?>
