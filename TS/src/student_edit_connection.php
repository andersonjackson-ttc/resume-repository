<?php
  #Call SQL connection
  include_once 'connection.php';
  #Pull Student information using profile ID
  $profile_id = htmlspecialchars($_GET["id"]);
  $sqlSelectStudent = "SELECT student_id, first_name, middle_initial, last_name,
   email, phone, graduated, graduation_date, military_status, security_clearance
   FROM students WHERE profile_id = ".$profile_id;
  $studentResult = mysqli_query($con, $sqlSelectStudent);

  #Pull Student Skills using profile ID
  $sqlSelectStudentSkills = "SELECT skill_id FROM student_skills WHERE
   profile_id = ".$profile_id;
  $studentSkillsResult = mysqli_query($con, $sqlSelectStudentSkills);

  #Pull List of Skills from database
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
 ?>
