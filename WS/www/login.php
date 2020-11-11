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
      $_SESSION['profile_id'] = $data['profile_id'];
      $_SESSION['first_name'] = $data['first_name'];
      $_SESSION['last_name'] = $data['last_name'];

      #store HTTP_USER_AGENT
      $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

      redirect_user('loggedin.php');

    } else { #login unsuccessful
      $errors[] = $data;
    }

    mysqli_close($con);
  }

  include('login_form.php'); #TODO include login html page
?>
