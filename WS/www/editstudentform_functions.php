<?php
function injectStudentInfo($studentResult){
  while($studentRow = mysqli_fetch_array($studentResult)) {
    ?>
    <div class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="profileID">Profile ID</label>
        <input name="profileID" id="profileID" type="text" class="form-control"
        style="width: 45vw;"
        value="<?php echo(htmlspecialchars($studentRow['profile_id']))?>" readonly>

        <label class="sr-only" for="studentID">Student ID</label>
        <input name="studentID" id="studentID" type="text" class="form-control"
        style="width: 45vw;"
        value="<?php echo(htmlspecialchars($studentRow['student_id']))?>">
      </div>
    </div>
    <br>
    <div class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="firstName">First Name
          <span class="requiredField">*</span></label>
        <input required name="firstName" type="text" class="form-control"
        style="width: 40vw;"
        value="<?php echo(htmlspecialchars($studentRow['first_name']))?>">

        <label class="sr-only" for="middleInitial">MI</label>
        <input name="middleInitial" type="text" class="form-control"
        style="width: 10vw;"
        value="<?php if($studentRow['middle_initial'] != null){
        echo(htmlspecialchars($studentRow['middle_initial']));
        } else {
        echo("");
      } ?>" maxlength="1">

        <label class="sr-only" for="lastName">Last Name
          <span class="requiredField">*</span></label>
        <input required name="lastName" type="text" class="form-control"
        style="width: 40vw;"
        value="<?php echo(htmlspecialchars($studentRow['last_name']))?>">
      </div>
    </div>
    <br>
    <div class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="studentEmail">Email
          <span class="requiredField">*</span></label>
        <input required name="studentEmail" id="studentEmail" type="email" class="form-control"
        style="width: 45vw;"
        value="<?php echo(htmlspecialchars($studentRow['email']))?>">

        <label class="sr-only" for="studentPhone">Phone Number
          <span class="requiredField">*</span></label>
        <input required name="studentPhone" id="studentPhone" type="phone" class="form-control"
        style="width: 45vw;"
        value="<?php echo(htmlspecialchars($studentRow['phone']))?>">
      </div>
    </div>
    <?php
  }
}

function injectStudentGeneralInfo($studentResult) {
  mysqli_data_seek($studentResult, 0);
  while($studentRow = mysqli_fetch_array($studentResult)){
    ?>
    <div class="form-check" style="padding-top: 10px;">
      <h4 class="text-muted">General</h4>
      <label>Military Veteran <span class="requiredField">*</span><br></label>
      <label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes"
        <?php echo($studentRow['military_status']==1 ? 'checked' : '');?>></label>
      <label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no"
        <?php echo($studentRow['military_status']==0 ? 'checked' : '');?>></label>
    </div>
    <div class="form-check">
      <label>Security Clearance<span class="requiredField">*</span><br></label>

      <label for="securityClearance">Yes<input id="securityClearanceYes"
        name="securityClearance" type="radio" value="yes"
        <?php echo($studentRow['security_clearance']>=1 ? 'checked' : '');?>></label>

      <label for="securityClearance">No<input id="securityClearanceNo"
        name="securityClearance" type="radio" value="no"
        <?php echo($studentRow['security_clearance']==0 ? 'checked' : '');?>></label>

      <div id="securityAttributes" style="margin-top: 5px;
      <?php echo($studentRow['security_clearance']>=1 ? '' : 'display: none');?>">
        <label for="securityAttributes">Clearance Level:<span class="requiredField">*</span></label>
        <select class="form-control" name="securityAttributes" id="securityAttributes"
        style="width: 30vw;">
          <option value="secret"
          <?php echo($studentRow['security_clearance']==1 ? 'selected' : '');?>>Secret</option>
          <option value="top-secret"
          <?php echo($studentRow['security_clearance']==2 ? 'selected' : '');?>>Top-Secret</option>
          <option value="confidential"
          <?php echo($studentRow['security_clearance']==3 ? 'selected' : '');?>>Confidential</option>
        </select>
        <br>
        <label>Currently Active?:<span class="requiredField">*</span>
          <label for="securityCurrent">Yes<input name="securityCurrent"
            type="radio" value="yes"></label>
          <label for="securityCurrent">No<input name="securityCurrent"
            type="radio" value="no"></label>
        </label>
      </div>
    </div>

    <div class="form-check">
      <label>Work Hours<span class="requiredField">*</span><br></label>
      <label>Full-Time<input name="workHours" type="radio" value="2"
        <?php echo($studentRow['work_hours']==2 ? 'checked' : '');?>></label>
      <label>Part-Time<input name="workHours" type="radio" value="1"
        <?php echo($studentRow['work_hours']==1 ? 'checked' : '');?>></label>
    </div>
    <div class="form-check">
      <label>Work Time<span class="requiredField">*</span><br></label>
      <label>Days<input name="workTime" type="radio" value="1"
        <?php echo($studentRow['work_time']==1 ? 'checked' : '');?>></label>
      <label>Nights<input name="workTime" type="radio" value="2"
        <?php echo($studentRow['work_time']==2 ? 'checked' : '');?>></label>
    </div>
    <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
      <h4 class="text-muted">Graduation</h4>
      <div class="row align-items-start no-gutters">
        <?php injectGraduation($studentResult) ?>
      </div>
    </div>
    <br>
    <div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
      <h4 class="text-muted">Prior Education</h4>
      <input type="checkbox" id="majors" name="majors" value="majors">
      <label for="majors">Prior Degrees</label><br>
      <div id="dvMajorsType" class="form-check form-check-inline" style="display: none; padding-bottom: 10px;">
        <select class="form-control" name="dvMajorsType" id="dvMajorsType" style="width: 30vw;">
          <option value="associates">Associates</option>
          <option value="bachelors">Bachelors</option>
          <option value="masters">Masters</option>
          <option value="phd">PHD</option>
         </select>

        <label class="sr-only" for="txtMajors">Type of degree:</label>
        <input name="degreeType" type="text" id="txtMajors" class="form-control" style="width: 30vw;"
        placeholder="Type of Degree" value="<?php if (isset($_POST['degree_type'])) echo $_POST['degree_type']; ?>">

        <label class="sr-only" for="txtMajorsSchool">Name of Institution:</label>
        <input name="institutionName" type="text" id="txtMajorsSchool" class="form-control" style="width: 30vw;"
        placeholder="Name of Institution" value="<?php if (isset($_POST['school_name'])) echo $_POST['school_name']; ?>">
      </div>
    </div>
    <?php
  }
}

function injectMajors($majorsResult, $studentMajorsResult) {
  while($majorsRow = mysqli_fetch_array($majorsResult)){
    $str = $majorsRow['major_name'];
    $majorsNoSpaces = str_replace(' ', '', $str);
    echo('<div class="col col-lg-3">');
    echo('<input name="'.$majorsNoSpaces.'" type="checkbox"
    class="form-check-input" id="major" value="'.$majorsRow['major_name'].'" '.
    checkMajors($majorsRow['major_id'],$studentMajorsResult).'>
    <label class="form-check-label" for="'.$majorsRow['major_name'].'">'.
    $majorsRow['major_name'].'</label></div>'
      );
  }
}

function injectTechSkills($skillsResult, $studentSkillsResult) {
  while($skillsRow = mysqli_fetch_array($skillsResult)){
    $str = $skillsRow['skill_name'];
    $skillsNoSpaces = str_replace(' ', '', $str);
    echo('<div class="col col-lg-3">');
    echo('<input name="'.$skillsNoSpaces.'" type="checkbox"
    class="form-check-input" id="skill" value="'.$skillsRow['skill_name'].'" '.
    checkSkills($skillsRow['skill_id'],$studentSkillsResult).'>
    <label class="form-check-label" for="'.$skillsRow['skill_name'].'">'.
    $skillsRow['skill_name'].'</label></div>'
      );
  }
}

function checkMajors($majorID, $studentMajors) {
  mysqli_data_seek($studentMajors, 0);
  while($studentMajorsRow = mysqli_fetch_array($studentMajors)) {
    if($majorID == $studentMajorsRow['major_id']){
      return('checked');
    }
  }
  return('');
}

function checkSkills($skillID, $studentSkills) {
  mysqli_data_seek($studentSkills, 0);
  while($studentSkillsRow = mysqli_fetch_array($studentSkills)) {
    if($skillID == $studentSkillsRow['skill_id']){
      return('checked');
    }
  }
  return('');
}

function checkProfSkills($skillID, $studentProfSkills) {
  mysqli_data_seek($studentProfSkills, 0);
  while($studentProfSkillsRow = mysqli_fetch_array($studentProfSkills)) {
    if($skillID == $studentProfSkillsRow['skill_id']){
      return($studentProfSkillsRow['skill_rating']);
    }
  }
  return(0);
}

function injectProfSkills($profSkillsResult, $studentProfSkillsResult) {
  mysqli_data_seek($studentProfSkillsResult, 0);
  while($profSkillsRow = mysqli_fetch_array($profSkillsResult)){
    $str = $profSkillsRow['skill_name'];
    $profSkillsNoSpaces = str_replace(' ', '', $str);
    $skillRating = checkProfSkills($profSkillsRow['skill_id'], $studentProfSkillsResult);
    echo('<li style="column-count: 2;">');
    echo('<div><label>'.$profSkillsRow['skill_name'].'</label></div>');
    echo('<div>');
    echo('<input name="'.$profSkillsNoSpaces.'" type="radio" id="profSkill"
        value="1" '.($skillRating==1 ? "checked" : "").'>
        <text>Fair</text>');
    echo('<input name="'.$profSkillsNoSpaces.'" type="radio" id="profSkill"
        style="margin-left: 30px;"
        value="2" '.($skillRating==2 ? "checked" : "").'>
        <text>Good</text>');
    echo('<input name="'.$profSkillsNoSpaces.'" type="radio" id="profSkill"
        style="margin-left: 30px;"
        value="3" '.($skillRating==3 ? "checked" : "").'>
        <text>Excellent</text>');
    echo('</div></li>');
  }
}

function injectJobInterests($jobResult, $studentJobResult) {
  while($jobResultRow = mysqli_fetch_array($jobResult)) {
    $str = $jobResultRow['job_name'];
    $jobNoSpaces = str_replace(' ', '', $str);
    echo('<div class="col col-lg-3">');
    echo('<input name="'.$jobNoSpaces.'" type="checkbox" id="jobInterest"
    value="'.$jobResultRow['job_name'].'" '.
    jobCheck($jobResultRow['job_id'], $studentJobResult).'>
    <label class="form-check-label" for="'.$jobResultRow['job_name'].'">'.
    $jobResultRow['job_name'].'</label></div>');
  }
}

function jobCheck($jobID, $studentJobResult) {
  mysqli_data_seek($studentJobResult, 0);
  while($studentJobRow = mysqli_fetch_array($studentJobResult)) {
    if($jobID == $studentJobRow['job_id']){
      return('checked');
    }
  }
  return('');
}

function injectCertifications($certsResult, $studentCertsResult) {
  while($certsResultRow = mysqli_fetch_array($certsResult)) {
    $str = $certsResultRow['certificate_name'];
    $certNoSpaces = str_replace(' ', '', $str);
    echo('<div class="col col-lg-3">');
    echo('<input name="'.$certNoSpaces.'" type="checkbox" id="certificates"
    value="'.$certsResultRow['certificate_name'].'" '.
    certCheck($certsResultRow['certificate_id'], $studentCertsResult).'>
    <label class="form-check-label" for="'.$certsResultRow['certificate_name'].'">'.
    $certsResultRow['certificate_name'].'</label></div>');
  }
}

function certCheck($certID, $studentCertsResult) {
  mysqli_data_seek($studentCertsResult, 0);
  while($studentCertsRow = mysqli_fetch_array($studentCertsResult)) {
    if($certID == $studentCertsRow['certificate_id']){
      return('checked');
    }
  }
  return('');
}

function injectGraduation($studentResult) {
  mysqli_data_seek($studentResult, 0);
  while($studentRow = mysqli_fetch_array($studentResult)) {
    $date = strtotime($studentRow['graduation_date']);
    echo('<div class="col col-lg-3">');
    echo('<label for="gradStatus">Graduation Status<span class="requiredField">*</span>
    <br></label>
    <select name="gradStatus" id="gradStatus" class="gradFields">');
    echo('<option '.($studentRow['graduated']==0 ? "selected" : "").'
    value="1">Graduated</option>');
    echo('<option '.($studentRow['graduated']==1 ? "selected" : "").'
    value="0">Not Graduated</option>
    </select></div>');
    echo('<div class="col col-lg-3">');
    echo('<label>Graduation Date <span class="requiredField">* </span>');
    echo('<input class="gradFields" name="gradDate" type="date"
    value="'.date('Y-m-d', $date).'"></label></div>');
  }
}

?>
