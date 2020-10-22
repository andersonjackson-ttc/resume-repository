<?php

  require '../src/connection.php';

  $studentId = $_POST['studentID'];
  $firstName = $_POST['firstName'];
  $middleInitial = $_POST['middleInitial'];
  $lastName = $_POST['lastName'];
  $email = $_POST['studentEmail'];
  $phone = $_POST['studentPhone'];
  $gradStatus = 1;
  $gradDate = 'CURDATE()';
  $resumePath = 'resumePathTest';
  $milStatus = 1;
  $clearance = 2;

  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearance)
          VALUES ('$studentId', '$firstName', '$middleInitial', '$lastName', '$email', '$phone', '$gradStatus', '$gradDate','$resumePath', '$milStatus', '$clearance');"

  mysqli_query($con, $sql);
?>