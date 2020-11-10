<?php
$page_title = 'Edit Student Form';
include ('../includes/header.html');
include_once '../src/student_edit_connection.php';
include ('editstudentform_functions.php');?>
<script src="editstudentform.js"></script>
<div class="container-fluid">
  <form method="post" action="<?php echo('editstudent_submit.php?id='.$profile_id);?>">
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding: 20px;">
        <h1>Edit Student Form</h1>
        <?php injectStudentInfo($studentResult); ?>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <?php injectStudentGeneralInfo($studentResult); ?>
    </div>
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Technical Skills</h4>
          <div class="row align-items-start no-gutters" style="margin-left: 25px;">
            <?php injectTechSkills($skillsResult, $studentSkillsResult); ?>
          </div>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <ul class="list-unstyled">
          <h4 class="text-muted">Professional Skills</h4>
          <?php injectProfSkills($profSkillsResult, $studentProfSkillsResult); ?>
      </div>
    </div>
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Job Interests</h4>
        <div class="row align-items-start no-gutters">
          <?php injectJobInterests($jobInterestsResult, $studentJobInterestsResult); ?>
        </div>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Certifications</h4>
        <div class="row align-items-start no-gutters">
          <?php injectCertifications($certsResult, $studentCertsResult); ?>
        </div>
      </div>
    </div>
    <br>
    <div class="form-check">
      <button class="btn btn-primary" type="submit" name="update">Update Student</button>
      <a href='studentDisplay.php'><input class="btn btn-secondary" type="button"
        name="cancel" value="Cancel and Exit"></a>
    </div>
    <br>
  </form>
</div>
<?php
$con->close();
include ('../includes/footer.html');
?>
