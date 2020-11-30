<?php
  include_once '../src/connection.php';
  include 'student_submit_functions.php';

  $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $gradStatusErr = $resumePathErr = $milStatusErr = $clearanceErr = "";

  $firstName = $middleInitial = $lastName = $email = $phone = "";

  $resumePath="path";

  if(isset($_POST['submit'])) {
    $middleInitial = test_input($_POST['middleInitial']);
    if(!empty($_POST['studentId'])) {
      $studentId = test_input($_POST['studentId']);
    }else{
      $studentId = 0;
    }
    if(!empty($_POST['firstName'])) {
      $firstName = test_input($_POST['firstName']);
    }else{
      $firstNameErr = "First Name is required";
    }
    if(!empty($_POST['lastName'])) {
      $lastName = test_input($_POST['lastName']);
    }else{
      $lastNameErr = "Last Name is required";
    }
    if(!empty($_POST['studentEmail'])) {
      $email = test_input($_POST['studentEmail']);
    }else{
      $emailErr = "Email is required";
    }
    if(!empty($_POST['studentPhone'])) {
      $phone = test_input($_POST['studentPhone']);
    }else{
      $phoneErr = "Phone Number is required";
    }
    if(isset($_POST['militaryStatus'])) {
      switch ($_POST['militaryStatus']) {
        case 'yes':
          $milStatus = 1;
          break;
        case 'no':
          $milStatus = 0;
          break;
      }
    }else{
      $milStatus = 0;
    }
    if(isset($_POST['securityClearance'])) {
      switch ($_POST['securityClearance']) {
        case 'yes':
          if(isset($_POST['securityAttributes'])) {
            switch ($_POST['securityAttributes']) {
              case 'secret':
                $clearance = 1;
                break;
              case 'top-secret':
                $clearance = 2;
                break;
              case 'confidential':
                $clearance = 3;
                break;
            }
          }else{
            $clearance = 0;
          }
          break;
        case 'no':
          $clearance = 0;
          break;
      }
    } else {
      $clearance = 0;
    }
    if(isset($_POST['gradStatus'])) {
      $gradStatus = $_POST['gradStatus'];
      if($gradStatus == 1) {
        $gradDate = mysqli_real_escape_string($con, $_POST['gradDate']);
        $gradDate = date('Y-m-d', strtotime(str_replace('-','/', $_POST['gradDate'])));
      }else{
        $gradDate = date('Y-m-d', strtotime(00000000));
      }
    }else{
      $gradStatus = 0;
    }
    if(isset($_POST['workHours'])) {
      $workHours = $_POST['workHours'];
    } else {
      $workHours = 'null';
    }
    if(isset($_POST['workTime'])) {
      $workTime = $_POST['workTime'];
    } else {
      $workTime = 'null';
    }
    
	  
	  
	  
	 $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $resumePath = $destination;
			
		 }
	}
	  
	  
	  
	  
	  
	  
    
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name,
    email, phone, graduated, graduation_date, resume_path, military_status, security_clearance,
  work_hours, work_time)
   VALUES ($studentId , '$firstName', '$middleInitial', '$lastName', '$email',
     '$phone', $gradStatus, '$gradDate', '$resumePath', $milStatus, $clearance,
   $workHours, $workTime);";

if ($con->query($sql) == TRUE) {
  try {
    $profile_id = mysqli_insert_id($con);
    insertTechSkills($con, $profile_id);
    insertProfSkills($con, $profile_id);
    insertJobInterests($con, $profile_id);
    insertCertifications($con, $profile_id);
    insertMajors($con, $profile_id);
    insertPriorEducation($con, $profile_id);
    include '../includes/header.html';
    createHTML();
    include '../includes/footer.html';
  } catch(exception $e) {
    echo "Error: " . $e->getMessage();
  }
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();

function createHTML(){
  ?>
  <br>
  <div class="container-fluid">
    <h3>Student Created Successfully!</h3>
    <br>
    <div class="form-check">
      <a href="studentDisplay.php">
        <button class="btn btn-primary" name="return">
          Return to Student List</button></a>
      <a href="student_form.php">
      <input class="btn btn-secondary" type="button"
        name="addAnother" value="Add Another Student"></a>
    </div>
  </div>
  <br>
  <?php
} ?>
