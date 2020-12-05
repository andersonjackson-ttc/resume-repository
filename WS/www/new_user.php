<?php
  $page_title = 'Register New User';
  require('../includes/header.html');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../src/connection.php');

    //trim whitespace from $_POST data
    //and save in $trimmmed array
    $trimmed = array_map('trim', $_POST);

    //default user password
    $new_user_password = SHA1('password');

    $first_name = $last_name = $email = $user_level = FALSE;
    $errors = [];

    //validate form inputs
    if (preg_match('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
      $first_name = mysqli_real_escape_string($con, $trimmed['first_name']);
    } else {
      $errors[] = 'Please enter your first name';
    }

    if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
      $last_name = mysqli_real_escape_string($con, $trimmed['last_name']);
    } else {
      $errors[] = 'Please enter your last name';
    }

    if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
      $email = mysqli_real_escape_string($con, $trimmed['email']);
    } else {
      $errors[] = 'Please enter your email';
    }

    if (isset($_POST['new_user_level'])) {
      $user_level = $_POST['new_user_level'];
    } else {
      $user_level = 0;
    }

    if (empty($errors)) {
      //make sure email is unique
      $query = "SELECT user_id FROM users WHERE user_email='$email';";
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));
      if (mysqli_num_rows($result) == 0) { //no matches found
        //add user to db
        $query = "INSERT INTO users (first_name, last_name, user_email, user_password, user_level, registration_date, last_login_date, last_password_date) VALUES
                                    ('$first_name', '$last_name', '$email', '$new_user_password', '$user_level', NOW(), NOW(), NOW());";
        $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));
        if (mysqli_affected_rows($con) == 1) {
          //success
          echo '<h3 class="text-success">New User Registered Successfully!</h3>';
          include('../includes/footer.html');
          exit();
        } else {
          $errors[] = 'You could not be registered due to a system error. We apologize for any inconvenience.';
        }
      }
    } else {
      echo '<h1>Error!</h1>
            <p class="text-danger">The following error(s) occurred:<br>';
      foreach ($errors as $msg) {
        echo " - $msg<br>\n";
      }
      echo '</p><p class="text-danger">Please try again</p>';
    }
    mysqli_close($con);
  }
?>

<div class="row justify-content-center">
  <div class="col col-lg-7">
    <h1 class="text-secondary">New User Registration</h1>
    <hr>

    <div class="row justify-content-center">
      <form class="border border-secondary rounded p-3 bg-info col-11" action="new_user.php" method="post">
        <fieldset class="border border-secondary rounded bg-light p-3">
          <div class="row form-inline p-2">
            <div class="col-6 pr-1">
              <label class="justify-content-start text-secondary pb-0" for="first_name" style="font-weight:bold;">First Name<span class="required_field">*</span></label>
              <input class="form-control py-0" type="text" name="first_name" id="first_name" style="min-width:100%;">
              <br><span class="small pt-0 mt-0 text-danger err_span" id="first_name_err">Field is required</span>
            </div>
            <div class="col-6 pl-1">
              <label class="justify-content-start text-secondary pb-0" for="last_name" style="font-weight:bold;">Last Name<span class="required_field">*</span></label>
              <input class="form-control py-0" type="text" name="last_name" id="last_name" style="min-width:100%;">
              <br><span class="small pt-0 mt-0 text-danger err_span" id="last_name_err">Field is required</span>
            </div>
          </div>
          <div class="row form-inline p-2">
            <div class="col-6 pr-1">
              <label class="justify-content-start text-secondary pb-0" for="email" style="font-weight:bold;">Email<span class="required_field">*</span></label>
              <input class="form-control py-0" type="email" name="email" id="email" style="min-width:100%;">
              <br><span class="small pt-0 mt-0 text-danger err_span" id="email_err">Field is required</span>
            </div>
            <div class="col-6 pl-1">
              <label class="justify-content-start text-secondary pb-0" for="new_user_level" style="font-weight:bold;">User Level</label>
              <select name="new_user_level" id="new_user_level" class="form-control" style="min-width:100%;">
                <option selected>Select</option>
                <option value="1">Faculty</option>
                <option value="0">Administrator</option>
              </select>
          </div>
          </div>
        </fieldset>
        <div class="row justify-content-end pr-3 pt-2">
          <input class="btn btn-secondary btn-outline-light mr-2" type="submit" name="submit" value="Submit">
          <a href="index.php"><button class="btn btn-secondary btn-outline-light" type="button">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="new_user.js" type="text/javascript"></script>
<?php include('../includes/footer.html'); ?>
