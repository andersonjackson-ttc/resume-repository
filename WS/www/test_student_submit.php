<?php
  include_once '../src/connection.php';

  $studentId = 1;
  
  $firstName = $_POST['firstName'];
  $middleInitial = 'a';
  $lastName = $_POST['lastName'];
  
  $email = 'name@email.com';
  $phone = '1234567890';
  $gradStatus = 1;
  $gradDate = '1'; //not in SQL statment
  $resumePath = 'path';
  $milStatus = 1;
  $clearance = 2;


  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, resume_path, military_status, security_clearance) VALUES ($studentId , '$firstName', '$middleInitial', '$lastName', '$email', '$phone', $gradStatus,'$resumePath', $milStatus, $clearance);";

	//$q = "SELECT COUNT(certificates) FROM resume_schema";


if ($con->query($sql) === TRUE) {
  header("Location: ../test_studentform.php?name_add=success");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();
?>


