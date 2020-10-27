<?php
  include_once '../src/connection.php';

  $studentId = 1;
  
  $firstName = $_POST['firstName'];
  $middleInitial = 'a';
  $lastName = $_POST['lastName'];
  
  $email = 'name@email.com';
  $phone = '1234567890';
  $gradStatus = 1;
  $gradDate = 'CURDATE()';
  $resumePath = 'path';
  $milStatus = 1;
  $clearance = 2;


  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearence) 
								VALUES ('$studentId', '$firstName', '$middleInitial', '$lastName', '$email', '$phone', '$gradStatus', '$gradDate','$resumePath', '$milStatus', '$clearance');";



if ($con->query($sql) === TRUE) {
  header("Location: ../test_studentform.php?name_add=success");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


