<?php
  #if no cookie is set redirect user to index.php
  if(!isset($_COOKIE['first_name'])) {
    require('../includes/'); #TODO require login functions
    redirect_user();
  } else {
    #delete cookie 
    setcookie('first_name');
  }

  $page_title = 'Logged Out';
  include('../includes/header.html');
 ?>

 <div class="row justify-content-center text-success">
   <h1 class="display-3">Logged Out</h1>
   <p> <?php {$first_name} ?>, you are now logged out. </p>
 </div>

 <?php
   include('..includes/footer.html');
  ?>
