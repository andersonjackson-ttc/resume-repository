<?php
include_once '../src/student_edit_connection.php';
include 'editstudent_submit_functions.php';
try {
  updateStudent($con, $profile_id);
  updateMajors($con, $profile_id, $majorsResult, $studentMajorsResult);
  updateTechSkills($con, $profile_id, $skillsResult, $studentSkillsResult);
  updateProfSkills($con, $profile_id, $profSkillsResult, $studentProfSkillsResult);
  updateJobInterests($con, $profile_id, $jobInterestsResult, $studentJobInterestsResult);
  updateCertificates($con, $profile_id, $certsResult, $studentCertsResult);
  updatePriorEducation($con, $profile_id, $educationResult);
  
  

	if(isset($_FILES){
	  
	$filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $resumePath = $filename;
			
			
			$stmt = $con->prepare("UPDATE students SET resume_path=? WHERE profile_id=".$profile_id);
			$stmt->bind_param('s', $resumePath);
			
			$stmt->execute();
			$stmt->close();
			
		 }
	}
	}
		
  
  $con->close();
  include '../includes/header.html';
  createHTML($profile_id);
  include '../includes/footer.html';
} catch(exception $e) {
  echo "Error: " . $e->getMessage();
}

function createHTML($profile_id){
  ?>
  <br>
  <div class="container-fluid">
    <h3>Student Updated Successfully!</h3>
    <br>
    <div class="form-check">
      <a href="studentDisplay.php">
        <button class="btn btn-primary" name="return">
          Return to Student List</button></a>
      <a href="<?php echo('editstudentform.php?id='.$profile_id);?>">
      <input class="btn btn-secondary" type="button"
        name="furtherChanges" value="Make Further Changes"></a>
    </div>
  </div>
  <br>
  <?php
} ?>
