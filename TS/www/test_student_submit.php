<?php
  include_once '../src/connection.php';

  
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];

 

  $sql = "INSERT INTO students_test (first_name, last_name)
          VALUES ('$firstName', '$lastName');";

  mysqli_query($con, $sql);

	header("Location: ../test_studentform.php?name_add=success");
	
