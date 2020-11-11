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
