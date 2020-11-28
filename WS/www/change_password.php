<?php
  $page_title = 'Change Password';
  include('../includes/login_functions.php');
  include('../includes/header.html');

  $errors = [];

  /*if session is not set delete buffer contents
  and redirect user to index.html*/
  if (!isset($_SESSION['user_id'])) {
    ob_end_clean();
    redirect_user();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../src/connection.php');

    #validate form data
    if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
      $old_password = SHA1(mysqli_real_escape_string($con, trim($_POST['old_password'])));
    } else {
      $old_password = null;
      $errors[] = 'Old password is required';
    }

    if (isset($_POST['password1']) && !empty($_POST['password1'])) {
      $password1 = mysqli_real_escape_string($con, trim($_POST['password1']));
    } else {
      $password1 = null;
      $errors[] = 'New password is required';
    }

    if (isset($_POST['password2']) && !empty($_POST['password2'])) {
      $password2 = mysqli_real_escape_string($con, trim($_POST['password2']));
    } else {
      $password2 = null;
      $errors[] = 'New password confirmation is required';
    }

    #make sure password entered matches password in db
    if ($old_password != $_SESSION['password']) {
      $errors[] = 'Password did not match registered user password';
    }

    #make sure new passwords match
    $p = FALSE;
    if ($password1 == $password2) {
      $p = SHA1($password1);
    } else {
      $errors[] = 'Your password did not match the confirmed password';
    }

    #set password
    if ($p && empty($errors)) {
      $query = "UPDATE users SET user_password='$p' WHERE user_id={$_SESSION['user_id']} LIMIT 1";
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));

      #success
      if (mysqli_affected_rows($con) == 1 && empty($errors)) {
        echo '<h3 class="text-success">Password changed successfully</h3>';
        mysqli_close($con);
        include('../includes/footer.html');
        exit();
      } else { #password change unsuccessful
        $errors[] = 'Your password was not changed. Make sure your new password is different
                    than the current password.';
      }
    } else {
      if (isset($errors) && !empty($errors)) {
        echo '<h1 class="text-danger">Error!</h1>
              <p class="text-danger">The following error(s) occurred:<br>';
              foreach ($errors as $msg) {
                echo " - $msg<br>\n";
              }
              echo '</p><p class="text-danger">Please try again</p><p><br></p>';
      }
    }
    mysqli_close($con);
  }
?>
<div class="row justify-content-center">
  <div class="col col-lg-7">
    <h1 class="text-secondary">Change Your Password</h1>
    <hr>

    <div class="">
      <form class="border border-secondary rounded col bg-info" action="change_password.php" method="post">
        <fieldset class="border border-secondary rounded mt-2 p-3 bg-light">
          <div class="form-inline">
            <label class="col-form-label-lg col-5 justify-content-start text-secondary" style="font-weight:bold;">Password</label>
            <div class="col px-0">
              <input class="form-control" type="password" name="old_password" style="width:100%;" id="old_password">
              <div class="err_msg small pt-0 mt-0 text-danger" id="err_old_password">Field is required</div>
            </div>
          </div>
        </fieldset>
        <fieldset class="border border-secondary rounded mt-2 p-3 bg-light">
          <div class="form-inline">
            <label class="col-form-label-lg col-5 justify-content-start text-secondary" style="font-weight:bold;">New Password</label>
            <div class="col px-0">
              <input class="form-control" type="password" name="password1" style="width:100%" id="password1">
              <div class="err_msg small pt-0 mt-0 text-danger" id="err_password1">Field is required</div>
            </div>
          </div>
          <div class="form-inline">
            <label class="col-form-label-lg col-5 justify-content-start text-secondary" style="font-weight:bold;">Confirm New Password</label>
            <div class="col px-0">
              <input class="form-control" type="password" name="password2" style="width:100%" id="password2">
              <div class="err_msg small pt-0 mt-0 text-danger" id="err_password2">Field is required</div>
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

<?php
  include('../includes/footer.html');
 ?>
<script src="../includes/change_password.js" type="text/javascript"></script>
