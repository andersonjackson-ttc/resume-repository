<?php
  include_once '../src/connection.php';

  $first = $_POST['first'];

  $sqlStudentInsert = "INSERT INTO students (student_id, first_name, middle_initial, last_name, email, phone, graduated, graduation_date, resume_path, military_status, security_clearance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  mysqli_query($con, $sqlStudentInsert);

header("Location: ../phpsqldemo.php?name_add=success");
