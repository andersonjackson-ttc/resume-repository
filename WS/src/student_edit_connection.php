<?php
  #Call SQL connection
  include_once 'connection.php';
  #Pull Student information using profile ID and verify ID
  $profile_id;
  if(isset($_GET["id"])){
    if(is_numeric($_GET["id"])){
      $sqlSelectProfileIDs = "SELECT profile_id FROM students";
      $profilesResult = mysqli_query($con, $sqlSelectProfileIDs);
      $found = 0;
      while($profilesRow = mysqli_fetch_array($profilesResult)){
        if($_GET["id"] == $profilesRow['profile_id']){
          $profile_id = htmlspecialchars($_GET["id"]);
          $found = 1;
          break;
        }
      }
      if($found == 0) {
        echo("<h1>Invalid StudentID!</h1><br><h3>Please select a valid StudentID</h3><br>");
        echo("<a href='../www/studentDisplay.php'><input type='button' name='return' value='Return'></a>");
        include ('../includes/footer.html');
        exit();
      }
    } else {
      echo("<h1>Invalid StudentID!</h1><br><h3>Please select a valid StudentID</h3><br>");
      echo("<a href='../www/studentDisplay.php'><input type='button' name='return' value='Return'></a>");
      include ('../includes/footer.html');
      exit();
    }
} else {
  echo("<h1>No Student Selected!</h1><br><h3>Please select a valid StudentID</h3><br>");
  echo("<a href='../www/studentDisplay.php'><input type='button' name='return' value='Return'></a>");
  include ('../includes/footer.html');
  exit();
}
  $sqlSelectStudent = "SELECT profile_id, student_id, first_name, middle_initial, last_name,
   email, phone, graduated, graduation_date, military_status, security_clearance
   FROM students WHERE profile_id = ".$profile_id;
  $studentResult = mysqli_query($con, $sqlSelectStudent);

  #Pull Student Technical Skills using profile ID
  $sqlSelectStudentSkills = "SELECT skill_id FROM student_tech_skills WHERE
   profile_id = ".$profile_id;
  $studentSkillsResult = mysqli_query($con, $sqlSelectStudentSkills);

  #Pull List of Technical Skills from database
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM tech_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);

  #Pull Student Professional Skills using profile ID
  $sqlSelectStudentProfSkills = "SELECT skill_id, skill_rating FROM
  student_prof_skills WHERE profile_id = ".$profile_id;
  $studentProfSkillsResult = mysqli_query($con, $sqlSelectStudentProfSkills);

  #Pull List of Professional Skills from database
  $sqlSelectProfSkills = "SELECT skill_id, skill_name FROM prof_skills";
  $profSkillsResult = mysqli_query($con, $sqlSelectProfSkills);

  #Pull Student Job Interests using profile ID
  $sqlSelectStudentJobInterests = "SELECT job_id FROM student_jobs
  WHERE profile_id=".$profile_id;
  $studentJobInterestsResult = mysqli_query($con, $sqlSelectStudentJobInterests);

  #Pull List of Job Interests from Database
  $sqlSelectJobInterests = "SELECT job_id, job_name FROM job_interest";
  $jobInterestsResult = mysqli_query($con, $sqlSelectJobInterests);

  #Pull List of Certificates using profile ID
  $sqlSelectStudentCerts = "SELECT certificate_id FROM student_certificates
  WHERE profile_id=".$profile_id;
  $studentCertsResult = mysqli_query($con, $sqlSelectStudentCerts);

  #Pull List of Certificates from Database
  $sqlSelectCerts = "SELECT certificate_id, certificate_name FROM certificates";
  $certsResult = mysqli_query($con, $sqlSelectCerts);

 ?>
