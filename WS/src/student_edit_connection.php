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
  $sqlSelectStudent = "SELECT * FROM students WHERE profile_id = ".$profile_id;
  $studentResult = mysqli_query($con, $sqlSelectStudent);

  #Pull Student Technical Skills using profile ID
  $sqlSelectStudentSkills = "SELECT skill_id FROM student_tech_skills WHERE
   profile_id = ".$profile_id;
  $studentSkillsResult = mysqli_query($con, $sqlSelectStudentSkills);

  #Pull List of Technical Skills from database
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM tech_skills ORDER BY ASC";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);

  #Pull Student Professional Skills using profile ID
  $sqlSelectStudentProfSkills = "SELECT skill_id, skill_rating FROM
  student_prof_skills WHERE profile_id = ".$profile_id;
  $studentProfSkillsResult = mysqli_query($con, $sqlSelectStudentProfSkills);

  #Pull List of Professional Skills from database
  $sqlSelectProfSkills = "SELECT skill_id, skill_name FROM prof_skills ORDER BY ASC";
  $profSkillsResult = mysqli_query($con, $sqlSelectProfSkills);

  #Pull Student Job Interests using profile ID
  $sqlSelectStudentJobInterests = "SELECT job_id FROM student_jobs
  WHERE profile_id=".$profile_id;
  $studentJobInterestsResult = mysqli_query($con, $sqlSelectStudentJobInterests);

  #Pull List of Job Interests from Database
  $sqlSelectJobInterests = "SELECT job_id, job_name FROM job_interest ORDER BY ASC";
  $jobInterestsResult = mysqli_query($con, $sqlSelectJobInterests);

  #Pull List of Certificates using profile ID
  $sqlSelectStudentCerts = "SELECT certificate_id FROM student_certificates
  WHERE profile_id=".$profile_id;
  $studentCertsResult = mysqli_query($con, $sqlSelectStudentCerts);

  #Pull List of Certificates from Database
  $sqlSelectCerts = "SELECT certificate_id, certificate_name FROM certificates ORDER BY ASC";
  $certsResult = mysqli_query($con, $sqlSelectCerts);

  #Pull List of Majors using profile ID
  $sqlSelectStudentMajors = "SELECT major_id FROM student_majors
  WHERE profile_id=".$profile_id;
  $studentMajorsResult = mysqli_query($con, $sqlSelectStudentMajors);

  #Pull List of Majors from database
  $sqlSelectMajors = "SELECT major_id, major_name FROM majors ORDER BY ASC";
  $majorsResult = mysqli_query($con, $sqlSelectMajors);

  #Pull Prior Education information from Database
  $sqlSelectEducation = "SELECT * FROM prior_education
  WHERE profile_id=".$profile_id;
  $educationResult = mysqli_query($con, $sqlSelectEducation);

 ?>
