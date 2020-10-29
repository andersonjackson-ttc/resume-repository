
<?php

$host = "192.168.6.3";
$port =3306;
$socket="";
$user = "resumeuser";
$password = "rsdbTtc9!";
//$dbName = "testdb";
$dbName = "resume_schema";

$con = new mysqli($host, $user, $password, $dbName, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());


//$con->close();



/*

mysqli_query($con, $sql);




$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
 

$sql = "INSERT INTO Students (first_name, last_name, email, phone) VALUES ('$first', '$last', '$email', '$phone');";


$testsql = "INSERT INTO test (fname) VALUES (Noah);";
*/

