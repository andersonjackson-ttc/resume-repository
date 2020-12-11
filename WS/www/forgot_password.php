<!--
  author: Khalid Smalls
  program: resume-repository
  purpose: send email to registered user address for password reset
-->

<?php
  $page_title = 'Forgot Password';
  include('../includes/header.html');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../src/connection.php');
    $user = FALSE;
    $errors = [];

    if (!empty($_POST['reset_email'])) {
      $email = filter_var($_POST['reset_email'], FILTER_VALIDATE_EMAIL);

      $query = 'SELECT user_id FROM users WHERE user_email="' . $email . '"';
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));

      if (mysqli_num_rows($result) == 1) {
        //retrieve user id
        list($user) = mysqli_fetch_array($result, MYSQLI_NUM);
      } else {
        $errors[] = 'The submitted email address does not match those on file';
      }
    } else {
      $errors[] = 'Please enter a valid email address';
    }

    if ($user) {
      //create a random string 10 characters long
      $p = substr(md5(uniqid(rand(), true)), 3, 15);
      //possible random string alternative using bin2hex()
      //$length = 10;
      //$p = bin2hex(random_bytes($length));
      $p_hashed = SHA1($p);

      //set user password to string of random characters
      $query = "UPDATE users SET user_password='$p_hashed', last_password_date=NOW() WHERE user_id=$user LIMIT 1";
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));

      if (mysqli_affected_rows($con) == 1) {
        //send new password to registered email address 
        $body = "Your temporary password for TTC Student Resume Repository is '$p'. Please change your password at next login.";
        mail($_POST['reset_email'], $body, 'From: '); //TODO add return address to from:

        echo '<h3 class="text-success">Your password has been changed. A temporary password has been sent to the email address with which you registered.
              Once you have logged in with this password you will be able to change your password by accessing the "Change Password" link.</h3>';
        mysqli_close($con);
        include('../includes/footer.html');
        exit();
      } else {
        $errors[] = 'Your password could not be changed due to a system error.
                     We apologize for any inconvenience.';
      }
    }
    mysqli_close($con);
  }

  if (isset($errors) && !empty($errors)) {
    echo '<h1 class="text-danger">Error!</h1>
          <p class="text-danger">The following error(s) occurred:<br>';
          foreach ($errors as $msg) {
            echo " - $msg<br>\n";
          }
          echo '</p><p class="text-danger">Please try again</p><p><br></p>';
  }
?>

<div class="row justify-content-center">
  <div class="col col-lg-7">
    <h1 class="text-secondary">Reset Your Password</h1>
    <hr>
    <div class="py-5">
      <form class="border border-secondary rounded col bg-info" action="forgot_password.php" method="post">
        <fieldset class="border border-secondary rounded mt-2 p-3 bg-light">
          <div class="form-inline">
            <label class="col-form-label-lg col-5 justify-content-start text-secondary" style="font-weight:bold;">Email Address</label>
            <div class="col px-0">
              <input class="form-control" type="email" name="reset_email" style="width:100%" id="reset_email">
              <div class="err_msg small pt-0 mt-0 text-danger" id="err_reset_email">Field is required</div>
            </div>
          </div>
        </fieldset>
        <div class="row justify-content-end p-3">
          <input class="btn btn-secondary btn-outline-light" type="submit" name="submit" value="Submit">
          <a href="index.php"><button class="btn btn-secondary btn-outline-light mx-2" type="button">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('../includes/footer.html'); ?>

<script src="change_password.js" type="text/javascript"></script>
