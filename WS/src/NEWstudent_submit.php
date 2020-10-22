<?php
  include_once '../src/connection.php';

  // $studentId = $_POST['studentID'];
  // $firstName = $_POST['firstName'];
  // $middleInitial = $_POST['middleInitial'];
  // $lastName = $_POST['lastName'];
  // $email = $_POST['studentEmail'];
  // $phone = $_POST['studentPhone'];
  // $gradStatus = $_POST['graduated'];
  // $gradDate = $_POST['gradDate'];
  // $resumePath = $_POST['resume']; <-- Needs work
  $milStatus = 1;
  $clearance = 2;

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    #declare and initialize error counter variable
    $errors = [];
    #These double check validity if the HTML 'required' attribute happens to fail or are manually removed with dev mode
    if ((empty($_POST['studentID']))||(!is_numeric($_POST['studentID']))){
      $errors[] = '<p class="error">Please enter a valid Student ID.</p>';
    } else {
        #trims white space and escapes common characters e.g. apostrophes
        $studentId = mysqli_real_escape_string($con, trim($_POST['studentID']));
    }
    if ((empty($_POST['firstName']))||(is_numeric($_POST['firstName']))){
      $errors[] = '<p class="error">Please enter a valid First Name.</p>';
    } else {
      $firstName = mysqli_real_escape_string($con, trim($_POST['firstName']));
    }
    if ((empty($_POST['lastName']))||(is_numeric($_POST['lastName']))){
      $errors[] = '<p class="error">Please enter a valid Last Name.</p>';
    } else {
          $lastName = mysqli_real_escape_string($con, trim($_POST['lastName']));
    }
    if (empty($_POST['studentEmail'])){
      $errors[] = '<p class="error">Please enter a valid Email Address.</p>';
    } else {
      $email = mysqli_real_escape_string($con, trim($_POST['studentEmail']));
    }
    if (empty($_POST['studentPhone'])){
      $errors[] = '<p class="error">Please enter a valid Phone Number.</p>';
    } else {
      $phone = mysqli_real_escape_string($con, trim($_POST['studentPhone']));
    }
    if (!isset($_POST['gradStatus'])){
      $errors[] = '<p class="error">Please enter a valid Graduation Status.</p>';
    } else {
      $gradStatus = mysqli_real_escape_string($con, trim($_POST['gradStatus']));
    }
    if (empty($_POST['gradDate'])){
      $errors[] = '<p class="error">Please enter a Graduation Date.</p>';
    } else {
      $gradDate = mysqli_real_escape_string($con, trim($_POST['gradDate']));
    }

    // TODO: Needs to submit to majors table not students:
    if (empty($_POST['majors'])){
      $errors[] = '<p class="error">Please enter (a) Major(s).</p>';
    } else {
      $majors = mysqli_real_escape_string($con, trim($_POST['majors']));
    }

    //TODO: Need to collect militaryStatus, clearance for students table:
    //TODO: Need to collect skills for skills table:
    //TODO: Need to collect certificates for certificate table:

    // TODO: Need to have this create a file path. Not just the attachment:
    if (empty($_POST['attachments'])){
      $errors = '<p class="error">Please attach (a) file(s).</p>';
    } else {
      $attachments = $_POST['attachments'];
    }

    if (empty($errors)) {
      
      require('connection.php');      
      $sqlStudentInsert = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearance)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sqlStudentInsert);
      $stmt->bind_param("isssssissii", $studentId, $firstName, $middleInitial, $lastName, $email, $phone, $gradStatus, $gradDate, $resumePath, $milStatus, $clearance);
      mysqli_stmt_execute($stmt);

      // Take database return and store in $stmt variable:
      mysqli_stmt_store_result($stmt);
      $result = mysqli_stmt_num_rows($stmt);

      if($result) {
        echo '<script>alert("Submission Successful")</script>';
      }
      else {
        echo '<h1 class="error">Submission Error</h1>
              <p class="error">Student could not be submitted due to a system error. We apologize for any inconvenience.</p>';
      }
    }
    else {
      echo '<h1 class="error">Error!</h1>;
          <p class="error">The following error(s) occurred:<br>';
      foreach ($errors as $msg) {
        echo " - $msg<br>\n";
      }
      echo '</p><p class="error">Please try again.</p><p><br></p>';
    }
    mysqli_close($con);
  }

//   $sqlStudentInsert = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//
//   mysqli_query($con, $sqlStudentInsert);
//
// header("Location: ../newstudentform.php?name_add=success");
