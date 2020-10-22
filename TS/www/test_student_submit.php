<?php
  require '../src/connection.php';

  $studentId = $_POST['studentID'];
  $firstName = $_POST['firstName'];
  $middleInitial = $_POST['middleInitial'];
  $lastName = $_POST['lastName'];
  $email = $_POST['studentEmail'];
  $phone = $_POST['studentPhone'];
 

  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone)
          VALUES ('$studentId', '$firstName', '$middleInitial', '$lastName', '$email', '$phone');"

  mysqli_query($con, $sql);
