<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../includes/');  #TODO get login functions file location
    requre('../src/connection.php');

    $errors = [];

    #validate form input
    if (empty($_POST['email']) {
      $errors[] = 'Email field is empty';
    }) else {
      $email = mysqli_real_escape_string($con, trim($_POST['email']));
    }

    if (empty($_POST['password']) {
      $errors[] = 'Password field is empty';
    }) else {
      $password = mysqli_real_escape_string($con, trim($_POST['password']));
    }

    list($check, $data) = check_login($con, $email, $password);

    if ($check) { #login successful
      setcookie('first_name', $data['first_name']);
      redirect_user('loggedin.php');
    } else { #login unsuccessful 
      $errors[] = $data;
    }

    mysqli_close($con);
  }

  include('..includes/'); #TODO include login html page
?>
