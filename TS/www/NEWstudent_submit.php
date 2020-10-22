<?php

  include_once '../src/connection.php';

  $studentId = $_POST['studentID'];
  $firstName = $_POST['firstName'];
  $middleInitial = $_POST['middleInitial'];
  $lastName = $_POST['lastName'];
  

  $sql = "INSERT INTO students (student_id, first_name, middle_initial, last_name)
          VALUES ('$studentId', '$firstName', '$middleInitial', '$lastName');

  mysqli_query($con, $sql);
