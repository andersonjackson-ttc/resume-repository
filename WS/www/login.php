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
      $_SESSION['first_name'] = $data['first_name'];
      $_SESSION['password'] = $data['user_password'];
      $_SESSION['user_level'] = $data['user_level'];
      $_SESSION['last_login_date'] = $data['last_login_date'];

      #store HTTP_USER_AGENT
      $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

      #set last login date to current login
      $query = "UPDATE users SET last_login_date=NOW() WHERE user_id={$_SESSION['user_id']} LIMIT 1";
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));

      //Password Policy - All handled using UTC. Time zones and leap years are not required since the lifespan of a password is just a set amount of time
      //Queries for the last time the password for the user was changed
      $getTime = "SELECT last_password_date FROM users WHERE user_id={$_SESSION['user_id']} LIMIT 1";
      $timeResult = mysqli_query($con, $getTime);
      $timeQueryResult = mysqli_num_rows($timeResult);
      while ($row = mysqli_fetch_assoc($timeResult)) {
        $lastPassDate = $row['last_password_date'];
      }
      //Convert the query to a datetime object represented as UTC instead of YYYY-MM-DD hh:mm:ss
      $dateToDT = new dateTime("$lastPassDate", new DateTimeZone("UTC"));
      //Convert the object to a string that can be printed and used in arithmatic
      $DTToString = $dateToDT->getTimestamp();
      //The maximum amount of time a password can be valid, in seconds (5184000 seconds is equal to 60 days)
      $passwordMaxAge = 5184000;
      //If the user information is correct, redirect them to the password change page if their password is older than 60 days (default), else proceed as normal
      if (mysqli_affected_rows($con) == 1) {
        if (time() - $DTToString > $passwordMaxAge){
          redirect_reset();
        }else{
          redirect_user();
        }
      }

    } else { #login unsuccessful
      $errors = $data;
    }

    mysqli_close($con);
  }

  include('../includes/login_form.php');
?>
