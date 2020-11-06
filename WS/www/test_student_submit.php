<?php
$page_title = 'Submit';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
include_once '../src/connection.php';

$errors = [];

if(empty($_POST['firstName'])){
	$errors[] = 'Required field:';
	}else{
		$firstName =  trim($_POST['firstName']);
	}
if(empty($_POST['middleInitial'])){
	$errors[] = 'Required field:';
	}else{
		$middleInitial = trim($_POST['middleInitial']);
	}

if(empty($_POST['lastName'])){
	$errors[] = 'Required field:';
	}else{
	  $lastName = trim($_POST['lastName']);
	}  
if(empty($_POST['studentId'])){
	$errors[] = 'Required field:';
	}else{
	 $studentId = trim($_POST['studentId']);
	} 
if(empty($_POST['email'])){
	$errors[] = 'Required field:';
	}else{
	 $email = trim($_POST['email']);
	} 
if(empty($_POST['phone'])){
	$errors[] = 'Required field:';
	}else{
	$phone = trim($_POST['phone']);
	} 
 if(empty($_POST['militaryStatus'])){
	$errors[] = 'Required field:';
	}else{
	$milStatus = trim($_POST['militaryStatus']);
	} 
 if(empty($_POST['securityClearance'])){
	$errors[] = 'Required field:';
	}else{
	$clearance = trim($_POST['securityClearance']);
	} 
 
 
  
  $gradStatus = 3;
  $gradDate = 1; //not in SQL statment
  $resumePath = 'path';



$sql = "INSERT INTO `students`( `student_id`, `first_name`, `middle_initial`, `last_name`, `email`, `phone`, `graduated`, `graduation_date`, `resume_path`, `military_status`, `security_clearance`) VALUES (SHA2('$studentId', 512),'$firstName', '$middleInitial', '$lastName', '$email', '$phone', $gradStatus,'$gradDate','$resumePath', '$milStatus', '$clearance' )";
//$q = "SELECT COUNT(certificates) FROM resume_schema";


$checkbox1=$_POST['skills'];  
  $N = count($checkbox1);

   
$chk="";  
	foreach($checkbox1 as $chk1)  
		 {  
		 $chk .= $chk1.",";  
		 }  
		$in_ch=mysqli_query($con,"insert into skills (skills) values ('$chk')"); 

		
$checkbox2=$_POST['job_interest'];  
   $J = count($checkbox2);

   
	$chkj="";  
	foreach($checkbox2 as $chk2)  
	{  
	$chkj .= $chk2.",";  
	}  
	$in_ch=mysqli_query($con,"insert into job_interest (job_interest) values ('$chkj')"); 
		
$checkbox3=$_POST['certification'];  
   $C = count($checkbox3);

   
$chkc="";  
	foreach($checkbox3 as $chk3)  
	{  
	$chkc .= $chk3.",";  
	}  
	$in_ch=mysqli_query($con,"insert into certification (certification) values ('$chkc')"); 

if ($con->query($sql) === TRUE) {
  header("Location: ../www/test_studentform.php?name_add=success");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();

}	

	




?>


