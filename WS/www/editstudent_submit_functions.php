<?php
function updateStudent($con, $profile_id) {
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
}

function updateTechSkills($con, $profile_id, $skillsResult, $studentSkillsResult){
  $stmt = $con->prepare("INSERT INTO student_tech_skills (profile_id, skill_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $skill_id);
  mysqli_data_seek($skillsResult, 0);
  while($skillsRow = mysqli_fetch_array($skillsResult)){
    $str = $skillsRow['skill_name'];
    $currentSkill = str_replace(' ', '', $str);
    if(isset($_POST[$currentSkill])){
      mysqli_data_seek($studentSkillsResult, 0);
      $found=0;
      while($studentSkillsRow = mysqli_fetch_Array($studentSkillsResult)){
        if($skillsRow['skill_id'] == $studentSkillsRow['skill_id']) {
          $found=1;
          break;
        }
      }
      if($found == 0) {
        $skill_id = $skillsRow['skill_id'];
        $stmt->execute();
      }
    } else { #If is not set, checks to see if skill is to be removed from joiner table
      mysqli_data_seek($studentSkillsResult, 0);
      while($studentSkillsRow = mysqli_fetch_Array($studentSkillsResult)){
        if($skillsRow['skill_id'] == $studentSkillsRow['skill_id']) {
          $skill_id = $skillsRow['skill_id'];
          deleteTechSkills($con, $profile_id, $skill_id);
        }
      }
    }
  }
  $stmt->close();
}

function deleteTechSkills($con, $profile_id, $skill_id) {
  $stmt = $con->prepare("DELETE FROM student_tech_skills
  WHERE profile_id=? AND skill_id=? LIMIT 1");
  $stmt->bind_param('ii', $profile_id, $skill_id);
  $stmt->execute();
  $stmt->close();
}

function updateProfSkills($con, $profile_id, $profSkills, $studentProfSkills) {
  $stmt = $con->prepare("UPDATE student_prof_skills SET skill_rating=?
  WHERE profile_id=? AND skill_id=?");
  $insertStmt = $con->prepare("INSERT INTO student_prof_skills (profile_id, skill_id, skill_rating)
  VALUES (?,?,?)");
  $stmt->bind_param('iii', $skillRating, $profile_id, $skillID);
  $insertStmt->bind_param('iii',$profile_id, $skillID, $skillRating);
  mysqli_data_seek($profSkills, 0);
  while($profSkillsRow = mysqli_fetch_array($profSkills)) {
    $str = $profSkillsRow['skill_name'];
    $currentSkill = str_replace(' ', '', $str);
    if(isset($_POST[$currentSkill])) {
      mysqli_data_seek($studentProfSkills, 0);
      $found=0;
      while($studentProfRow = mysqli_fetch_array($studentProfSkills)) {
        if($studentProfRow['skill_id'] == $profSkillsRow['skill_id']) {
          $found=1;
          break;
        }
      } #End of studentProfRow while loop
      $skillID = $profSkillsRow['skill_id'];
      $skillRating = $_POST[$currentSkill];

      if($found==1) { #Determines if an UPDATE or INSERT INTO statement will be used
        $stmt->execute();
      } else {
        $insertStmt->execute();
      }
    } #End of isset if statement
  }
  $stmt->close();
  $insertStmt->close();
} #End of Function

function updateJobInterests($con, $profile_id, $jobResult, $studentJobResult) {
  $stmt = $con->prepare("INSERT INTO student_jobs (profile_id, job_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $job_id);
  mysqli_data_seek($jobResult, 0);
  while($jobRow = mysqli_fetch_array($jobResult)){
    $str = $jobRow['job_name'];
    $currentJob = str_replace(' ', '', $str);
    if(isset($_POST[$currentJob])){
      mysqli_data_seek($studentJobResult, 0);
      $found=0;
      while($studentJobRow = mysqli_fetch_Array($studentJobResult)){
        if($jobRow['job_id'] == $studentJobRow['job_id']) {
          $found=1;
          break;
        }
      }
      if($found == 0) {
        $job_id = $jobRow['job_id'];
        $stmt->execute();
      }
    } else { #If is not set, checks to see if skill is to be removed from joiner table
      mysqli_data_seek($studentJobResult, 0);
      while($studentJobRow = mysqli_fetch_Array($studentJobResult)){
        if($jobRow['job_id'] == $studentJobRow['job_id']) {
          $job_id = $jobRow['job_id'];
          deleteJobInterests($con, $profile_id, $job_id);
        }
      }
    }
  }
  $stmt->close();
}

function deleteJobInterests($con, $profile_id, $job_id) {
  $stmt = $con->prepare("DELETE FROM student_job_interest
  WHERE profile_id=? AND job_id=? LIMIT 1");
  $stmt->bind_param('ii', $profile_id, $job_id);
  $stmt->execute();
  $stmt->close();
}

function updateCertificates($con, $profile_id, $certsResult, $studentCertsResult) {
  $stmt = $con->prepare("INSERT INTO student_certificates (profile_id, certificate_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $cert_id);
  mysqli_data_seek($certsResult, 0);
  while($certsRow = mysqli_fetch_array($certsResult)){
    $str = $certsRow['certificate_name'];
    $currentCert = str_replace(' ', '', $str);
    if(isset($_POST[$currentCert])){
      mysqli_data_seek($studentCertsResult, 0);
      $found=0;
      while($studentCertsRow = mysqli_fetch_Array($studentCertsResult)){
        if($certsRow['certificate_id'] == $studentCertsRow['certificate_id']) {
          $found=1;
          break;
        }
      }
      if($found == 0) {
        $cert_id = $certsRow['certificate_id'];
        $stmt->execute();
      }
    } else { #If is not set, checks to see if skill is to be removed from joiner table
      mysqli_data_seek($studentCertsResult, 0);
      while($studentCertsRow = mysqli_fetch_Array($studentCertsResult)){
        if($certsRow['certificate_id'] == $studentCertsRow['certificate_id']) {
          $cert_id = $certsRow['certificate_id'];
          deleteCertificate($con, $profile_id, $cert_id);
        }
      }
    }
  }
  $stmt->close();
}

function deleteCertificate($con, $profile_id, $cert_id) {
  $stmt = $con->prepare("DELETE FROM student_certificates
  WHERE profile_id=? AND certificate_id=? LIMIT 1");
  $stmt->bind_param('ii', $profile_id, $cert_id);
  $stmt->execute();
  $stmt->close();
}

?>
