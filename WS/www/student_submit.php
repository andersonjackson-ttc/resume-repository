<?php
  include_once '../src/connection.php';
  include_once '../src/student_edit_connection.php';
  include 'editstudent_submit_functions.php';

  $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $gradStatusErr = $resumePathErr = $milStatusErr = $clearanceErr = "";
  
  $firstName = $middleInitial = $lastName = $email = $phone = "";

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
      $milStatusErr = "Military status is required";
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
            $clearanceErr = "Security clearance is required if applicable";
          }
          break;
        case 'no':
          $clearance = 0;
          break;
      }
    }
    if(isset($_POST['gradStatus'])) {
      switch ($_POST['gradStatus']) {
        case 'graduated':
          $gradStatus = 1;
          break;
        case 'notGraduated':
          $gradStatus = 0;
      }
      if($gradStatus == 1) {
        $gradDate = mysqli_real_escape_string($con, $_POST['gradDate']);
        $gradDate = date('Y-m-d', strtotime(str_replace('-','/', $gradDate)));
      }else{
        $gradDate = 'null';
      }
    }else{
      $gradStatusErr = "Must select graduated or not graduated";
    }
    if(isset($_FILES['attachments'])) {
      $file_name = $_FILES['attachments']['name'];
      $file_size = $_FILES['attachments']['size'];
      $file_tmp = $_FILES['attachments']['tmp_name'];
      $file_type = $_FILES['attachments']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['attachments']['name'])));

      $extensions = array("pdf");

      if(in_array($file_ext,$extensions)===false){
        $resumePathErr = "extension not allowed, please choose pdf format";
      }else{
        move_upload_file($file_tmp,"".$file_name);
        $resumePath = $file_tmp;
      }
    }
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearance)
   VALUES ($studentId , '$firstName', '$middleInitial', '$lastName', '$email', '$phone', $gradStatus, '$gradDate', '$resumePath', $milStatus, $clearance);";

if ($con->query($sql) == TRUE) {
	
	
	
	
  header("Location: ../student_form.php");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$q = "SELECT MAX(profile_id) FROM students;";
$profile_id = @mysqli_query($con, $q);
	
try {
	

	
	
  updateTechSkills($con, $profile_id, $skillsResult, $studentSkillsResult);
  updateProfSkills($con, $profile_id, $profSkillsResult, $studentProfSkillsResult);
  updateJobInterests($con, $profile_id, $jobInterestsResult, $studentJobInterestsResult);
  updateCertificates($con, $profile_id, $certsResult, $studentCertsResult);
  
} catch(exception $e) {
  echo "Error: " . $e->getMessage();
}



$con->close();
?>
