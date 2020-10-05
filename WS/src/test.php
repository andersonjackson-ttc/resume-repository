


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ResumeRepo";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) 
{
die("Connection failed: " . mysqli_connect_error());
}




 $first = $_POST['first'];
 $last = $_POST['last'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 

 $sql = "INSERT INTO Students (first_name, last_name, email, phone) VALUES ('$first', '$last', '$email', '$phone');";

 mysqli_query($conn, $sql);