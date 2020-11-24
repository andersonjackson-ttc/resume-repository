<?php
$page_title = 'Edit Student Form';
session_start();
include ('../includes/header.html');
include_once '../src/student_edit_connection.php';
include ('editstudentform_functions.php');?>
<script src="editstudentform.js"></script>
<style>
  .requiredField{
    color: red;
    font-weight: bold;
  }
</style>
<div class="container-fluid">
  <form id="myform" method="post" action="<?php echo('editstudent_submit.php?id='.$profile_id);?>">
    <br>
    <button id="editBtn" class="btn btn-primary" type="button" name="edit">Edit Student</button>
    <fieldset id="viewSetting" disabled="disabled">
    <br>
    <input type="hidden" id="changed" name="changed" value="yes" />
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding: 20px;">
        <h1>Edit Student Form</h1>
        <?php injectStudentInfo($studentResult); ?>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <?php injectStudentGeneralInfo($studentResult, $educationResult); ?>
    </div>
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Majors</h4>
        <div class="row align-items-start no-gutters" style="margin-left: 25px;">
          <?php injectMajors($majorsResult, $studentMajorsResult); ?>
        </div>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Technical Skills</h4>
          <div class="row align-items-start no-gutters" style="margin-left: 25px;">
            <?php injectTechSkills($skillsResult, $studentSkillsResult); ?>
          </div>
      </div>
    </div>
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <ul class="list-unstyled">
          <h4 class="text-muted">Professional Skills</h4>
          <?php injectProfSkills($profSkillsResult, $studentProfSkillsResult); ?>
      </div>
    </div>
    <br>
    <div class="border border-info">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Job Interests</h4>
        <div class="row align-items-start no-gutters">
          <?php injectJobInterests($jobInterestsResult, $studentJobInterestsResult); ?>
        </div>
      </div>
    </div>
    <br>
    <div class="border border-info" style="background-color: #5bc0de;">
      <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="text-muted">Certifications</h4>
        <div class="row align-items-start no-gutters">
          <?php injectCertifications($certsResult, $studentCertsResult); ?>
        </div>
      </div>
    </div>
    <br>
    </fieldset>
    <br>
    <div class="form-check">
      <button id="updateBtn" class="btn btn-primary" type="submit" name="update" style="display: none;">Update Student</button>
      <a href='studentDisplay.php'><input class="btn btn-secondary" type="button"
        name="cancel" value="Cancel and Exit"></a>
    </div>
    <br>
  </form>
</div>
<script src="pagedeparture.js"></script>
<?php
$con->close();
include ('../includes/footer.html');
?>
