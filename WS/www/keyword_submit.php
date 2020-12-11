<?php
/*
Author: Noah Adkin
File: Keyword_submit.php
Purpose: Back end for adding/removing attribute lists on database. 

*/


  include_once '../src/connection.php';


 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function deleteTechSkill($con) {
  $stmt = $con->prepare("DELETE FROM student_tech_skills WHERE skill_id =?");
  $stmt->bind_param('i', $skill_id);
  $sqlSelectSkills = "SELECT * FROM tech_skills";
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

 function deleteTechSkillInstances($con) {
  $stmt = $con->prepare("DELETE FROM tech_skills
  WHERE  skill_id = ?");

   $stmt->bind_param('i', $skill_id);



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

 function deleteJobInterest($con) {
  $stmt = $con->prepare("DELETE FROM student_jobs WHERE job_id =?");
  $stmt->bind_param('i', $job_id);
  $sqlSelectJobs = "SELECT * FROM job_interest";
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

 function deleteJobInterestInstances($con) {
  $stmt = $con->prepare("DELETE FROM job_interest
  WHERE  job_id = ?");

   $stmt->bind_param('i', $job_id);



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







 function deleteCert($con) {
  $stmt = $con->prepare("DELETE FROM student_certificates WHERE certificate_id =?");
  $stmt->bind_param('i', $certificate_id);
  $sqlSelectCertificates = "SELECT * FROM certificates";
  $certificatesResult = mysqli_query($con, $sqlSelectCertificates);
  while($certificatesRow = mysqli_fetch_array($certificatesResult)) {
    $str = $certificatesRow['certificate_name'];
    $certificateNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$certificateNameNoSpaces])) {
      $certificate_id = $certificatesRow['certificate_id'];

      $stmt->execute();
    }
  }
  $stmt->close();
}

 function deleteCertInstances($con) {
  $stmt = $con->prepare("DELETE FROM certificates
  WHERE  certificate_id = ?");

   $stmt->bind_param('i', $certificate_id);



  $sqlSelectCertificates = "SELECT certificate_id, certificate_name FROM certificates";
  $certificatesResult = mysqli_query($con, $sqlSelectCertificates);
  while($certificatesRow = mysqli_fetch_array($certificatesResult)) {
    $str = $certificatesRow['certificate_name'];
    $certificateNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$certificateNameNoSpaces])) {
      $certificate_id = $certificatesRow['certificate_id'];
      $stmt->execute();
    }
  }
  $stmt->close();
}





 function deleteProfSkill($con) {
  $stmt = $con->prepare("DELETE FROM student_prof_skills WHERE skill_id =?");
  $stmt->bind_param('i', $skill_id);
  $sqlSelectSkills = "SELECT * FROM prof_skills";
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

 function deleteProfSkillInstances($con) {
  $stmt = $con->prepare("DELETE FROM prof_skills
  WHERE  skill_id = ?");

   $stmt->bind_param('i', $skill_id);



  $sqlSelectSkills = "SELECT skill_id, skill_name FROM prof_skills";
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

function deleteMajor($con) {
  $stmt = $con->prepare("DELETE FROM majors WHERE major_id =?");
  $stmt->bind_param('i', $major_id);
  $sqlSelectMajors = "SELECT * FROM majors";
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

 function deleteMajorInstances($con) {
  $stmt = $con->prepare("DELETE FROM majors
  WHERE  major_id = ?");

   $stmt->bind_param('i', $major_id);



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



	deleteTechSkill($con);
	deleteTechSkillInstances($con);
	
	deleteJobInterest($con);
	deleteJobInterestInstances($con);

	deleteCert($con);
	deleteCertInstances($con);
	
	deleteProfSkill($con);
	deleteProfSkillInstances($con);
	
	deleteMajor($con);
	deleteMajorInstances($con);
	
	

	if(!empty($_POST['newTechSkill'])) {
		$newTechSkill = test_input($_POST['newTechSkill']);
    $sql = "INSERT INTO tech_skills(skill_name) VALUES ('$newTechSkill');";
    mysqli_query($con, $sql);
	}
	
	if(!empty($_POST['newJob'])) {
		$newJob = test_input($_POST['newJob']);
    $sql = "INSERT INTO job_interest(job_name) VALUES ('$newJob');";
    mysqli_query($con, $sql);
	}
	
	if(!empty($_POST['newCert'])) {
		$newCert = test_input($_POST['newCert']);
    $sql = "INSERT INTO certificates(certificate_name) VALUES ('$newCert');";
    mysqli_query($con, $sql);
	}
	
	if(!empty($_POST['newProfSkill'])) {
		$newProfSkill = test_input($_POST['newProfSkill']);
    $sql = "INSERT INTO prof_skills(skill_name) VALUES ('$newProfSkill');";
    mysqli_query($con, $sql);
	}
	
	if(!empty($_POST['newMajor'])) {
		$newMajor = test_input($_POST['newMajor']);
    $sql = "INSERT INTO majors(major_name) VALUES ('$newMajor');";
    mysqli_query($con, $sql);
	}

header("Location: keyword.php?name_add=success");
$con->close();
?>
