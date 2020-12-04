<?php
function insertTechSkills($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO student_tech_skills (profile_id, skill_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $skill_id);
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM tech_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
  while($skillsRow = mysqli_fetch_array($skillsResult)) {
    $str = $skillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $skillsRow['skill_id'];
      $stmt->execute();
    }
  }
  $stmt->close();
}

function insertProfSkills($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO student_prof_skills (profile_id, skill_id, skill_rating)
  VALUES (?,?,?)");
  $stmt->bind_param('iii', $profile_id, $skill_id, $skill_rating);
  $sqlSelectProfSkills = "SELECT skill_id, skill_name FROM prof_skills";
  $profSkillsResult = mysqli_query($con, $sqlSelectProfSkills);
  while($profSkillsRow = mysqli_fetch_array($profSkillsResult)) {
    $str = $profSkillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $profSkillsRow['skill_id'];
      $skill_rating = $_POST[$skillNameNoSpaces];
      $stmt->execute();
    }
  }
  $stmt->close();
}

function insertJobInterests($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO student_jobs (profile_id, job_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $job_id);
  $sqlSelectJobs = "SELECT job_id, job_name FROM job_interest";
  $jobsResult = mysqli_query($con, $sqlSelectJobs);
  while($jobsRow = mysqli_fetch_array($jobsResult)) {
    $str = $jobsRow['job_name'];
    $jobNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$jobNameNoSpaces])) {
      $job_id = $jobsRow['job_id'];
      $stmt->execute();
    }
  }
  $stmt->close();
}

function insertCertifications($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO student_certificates (profile_id, certificate_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $certificate_id);
  $sqlSelectCerts = "SELECT certificate_id, certificate_name FROM certificates";
  $certsResult = mysqli_query($con, $sqlSelectCerts);
  while($certsRow = mysqli_fetch_array($certsResult)) {
    $str = $certsRow['certificate_name'];
    $certNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$certNameNoSpaces])) {
      $certificate_id = $certsRow['certificate_id'];
      $stmt->execute();
    }
  }
  $stmt->close();
}

function insertMajors($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO student_majors (profile_id, major_id)
  VALUES (?,?)");
  $stmt->bind_param('ii', $profile_id, $major_id);
  $sqlSelectMajors = "SELECT major_id, major_name FROM majors";
  $majorsResult = mysqli_query($con, $sqlSelectMajors);
  while($majorsRow = mysqli_fetch_array($majorsResult)) {
    $str = $majorsRow['major_name'];
    $majorNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$majorNameNoSpaces])) {
      $major_id = $majorsRow['major_id'];
      $stmt->execute();
    }
  }
  $stmt->close();
}

function insertPriorEducation($con, $profile_id) {
  $stmt = $con->prepare("INSERT INTO prior_education (profile_id, degree_level, degree_type, school_name)
  VALUES (?,?,?,?)");
  $stmt->bind_param('iiss', $profile_id, $degreeLevel, $degreeType, $schoolName);
  $degreeArray = $_POST['majorsType'];
  $degreeTypeArray = $_POST['majors'];
  $schoolNameArray = $_POST['majorsSchool'];
  for($i=0; $i < count($degreeArray); $i++){
    if(isset($degreeArray[$i]) && isset($degreeTypeArray[$i]) && isset($schoolNameArray[$i])) {
      $degreeLevel = $degreeArray[$i];
      $degreeType = $degreeTypeArray[$i];
      $schoolName = $schoolNameArray[$i];
      $stmt->execute();
    }
  }
  $stmt->close();
}
