
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




