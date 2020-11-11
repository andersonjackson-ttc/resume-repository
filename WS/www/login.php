<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../includes/login_functions.php');
    require('../src/connection.php');

    $errors = [];

    #validate login form input
    if (empty($_POST['email'])) {
      $errors[] = 'Email field is empty';
    } else {
      $email = mysqli_real_escape_string($con, trim($_POST['email']));
    }

    if (empty($_POST['password'])) {
      $errors[] = 'Password field is empty';
    } else {
      $password = mysqli_real_escape_string($con, trim($_POST['password']));
    }

    list($check, $data) = check_login($con, $email, $password);

    if ($check) { #login successful
      session_start();

      #store session data
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['email'] = $data['user_email'];
      $_SESSION['password'] = $data['user_password'];

      #store HTTP_USER_AGENT
      $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

      redirect_user('loggedin.php');

    } else { #login unsuccessful
      $errors = $data;
    }

    mysqli_close($con);
  }

  include('../includes/login_form.php'); 
?>
