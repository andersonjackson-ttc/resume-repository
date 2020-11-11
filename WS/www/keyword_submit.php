<?php
  include_once '../src/connection.php';

$newTechSkill = "";
  
  /*
  function deleteTechSkill($con, $skill_id) {
  $stmt = $con->prepare("DELETE FROM student_tech_skills (skill_id)
  WHERE  skill_id = (?)");

      $stmt->execute();
    
    $stmt = $con->prepare("DELETE FROM tech_skills (skill_id)
  WHERE  skill_id = (?)");
  
  $stmt->close();
}
*/
  
 
  if(!empty($_POST['newTechSkill'])) {
      $newTechSkill = test_input($_POST['newTechSkill']);
    }
  
  
  $sql = "INSERT INTO tech_skills (skill_name)
   VALUES ($newTechSkill);";
   
   

if ($con->query($sql) == TRUE) {
	
	
  header("Location: ../keyword.php");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

/*
function deleteTechSkills($con, $profile_id) {
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
*/
?>



