<?php
  $page_title = 'Register New User';
  require('../includes/header.html');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../src/connection.php');

    //trim whitespace from $_POST data
    //and save in $trimmmed array
    $trimmed = array_map('trim', $_POST);

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

    if (isset($_POST['user_level'])) {
      switch ($_POST['user_level']) {
        case 'faculty';
          $user_level = 1;
          break;
        case 'administrator':
          $user_level = 0;
          break;
      }
    } else {
      $user_level = 0;
    }

    // if (isset($_POST['user_level'])) {
    //   $user_level = $_POST['user_level'];
    // }

    if (empty($errors)) {
      //make sure email is unique
      $query = "SELECT user_id FROM users WHERE user_email='$email';";
      $result = mysqli_query($con, $query) or trigger_error("Query: $query\n<br>MySql Error: " . mysqli_error($con));
      if (mysqli_num_rows($result) == 0) { //no matches found
        //add user to db
        $query = "INSERT INTO users (first_name, last_name, user_email, user_level, registration_date) VALUES
                                    ('$first_name', '$last_name', '$email', '$user_level', NOW());";
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

<h1>New User Registration</h1>
<hr>

<div class="row justify-content-center">
  <form class="border border-secondary rounded p-3 bg-info" action="new_user.php" method="post">
    <fieldset class="border border-secondary rounded bg-light p-3">
      <div class="form-inline">
        <input class="form-control" type="text" name="first_name" value="<?php if (isset($trimmed['first_name'])) {echo $trimmed['first_name'];} else {echo 'First Name';}?>">
        <input class="form-control" type="text" name="last_name" value="Last Name">
      </div>
      <div class="form-inline">
        <input class="form-control" type="email" name="email" value="Email">
        <select class="form-control" style="min-width:50%;">
          <option selected>User Level</option>
          <option value="1">Faculty</option>
          <option value="0">Administrator</option>
        </select>
      </div>
    </fieldset>
    <div class="row justify-content-end pr-3 pt-2">
      <input class="btn btn-secondary btn-outline-light mr-2" type="submit" name="submit" value="Submit">
      <a href="index.php"><button class="btn btn-secondary btn-outline-light" type="button">Cancel</button></a>
    </div>
  </form>
</div>

<?php include('../includes/footer.html'); ?>
