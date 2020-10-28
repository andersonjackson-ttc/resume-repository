<?php
include_once '../src/student_edit_connection.php';
try {
$stmt = $con->prepare("UPDATE students SET student_id=?, first_name=?, middle_initial=?,
  last_name=?, email=?, phone=?, military_status=?, security_clearance=?
  WHERE profile_id=".$profile_id);
$stmt->bind_param('isssssii', $studentID, $firstName, $middleInitial,
$lastName, $email, $phone, $militaryStatus, $securityClearance);
$studentID = $_POST['studentID'];
$firstName = $_POST['firstName'];
$middleInitial = $_POST['middleInitial'];
$lastName = $_POST['lastName'];
$email = $_POST['studentEmail'];
$phone = $_POST['studentPhone'];
if($_POST['militaryStatus']=='no'){
  $militaryStatus = 0;
} else {
  $militaryStatus = 1;
}
if($_POST['securityClearance']=='no') {
  $securityClearance = 0;
} else {
  if(isset($_POST['securityAttributes'])){
    if($_POST['securityAttributes']=='secret'){
      $securityClearance = 1;
    } else if($_POST['securityAttributes']=='top-secret'){
      $securityClearance = 2;
    } else {
      $securityClearance = 3;
    }
  }
}
$stmt->execute();
$stmt->close();
$con->close();
include '../includes/header.html';?>
<br>
<h3>Student Updated Successfully!</h3>
<br>
<br>
<a href="studentDisplay.php"><input type="button" value="Return to Student List"></a>
<a href="<?php echo('editstudentform.php?id='.$profile_id);?>">
  <input type="button" value="Make further changes"></a>
  <br>
  <br>
<?php include '../includes/footer.html';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
} ?>
