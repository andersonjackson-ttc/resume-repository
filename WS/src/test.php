


$host = "192.168.6.3";
$port =3306;
$socket="";
$user = "root";
$password = "rsdbTtc1!";
$dbName = "resume_schema";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();




 $first = $_POST['first'];
 $last = $_POST['last'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 

 $sql = "INSERT INTO Students (first_name, last_name, email, phone) VALUES ('$first', '$last', '$email', '$phone');";


$testsql = "INSERT INTO test (fname) VALUES (Noah);";


 mysqli_query($con, $sql);