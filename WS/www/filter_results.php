<?php

/*
Author: Noah Adkin
File: filter_results.php
Purpose: Back end for filtering students by attributes.

*/
  include ('../includes/header.html');
  include_once '../src/connection.php';


  $gradStatusErr  = $milStatusErr = $clearanceErr = "";
  
  $search = "";

$t_q = "SELECT profile_id from ( ";

$conditions = [];

$matches = 0;
$tech_skill_ids = [];
$prof_skill_ids = [];
$certificate_ids = [];
$major_ids = [];
$job_ids = [];

  

 //uniontbl open
 $t_q .= "SELECT profile_id, SUM(cnt) matches FROM ("; 
	  
	  
//tech skills

  
  
  
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM tech_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
  while($skillsRow = mysqli_fetch_array($skillsResult)) {
    $str = $skillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $skillsRow['skill_id'];
	  $tech_skill_ids[] = $skill_id;
	  
		$matches += 1;
    }
  }
  if(!empty($tech_skill_ids)){
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_tech_skills WHERE skill_id in ";
  $t_q .= "(" . implode(",", $tech_skill_ids) . ") GROUP BY profile_id";

  }
	  
  
  
  
  
  //prof skills
  
  
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM prof_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
  while($skillsRow = mysqli_fetch_array($skillsResult)) {
    $str = $skillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      //$skill_id = $skillsRow['skill_id'];
	  $prof_skill_ids[] = "(skill_id = " . $skillsRow['skill_id'] . " AND skill_rating >= " . $_POST[$skillNameNoSpaces];	    	  
	  $matches += 1;
    }
  }
  
  
	if(!empty($prof_skill_ids) && !empty($tech_skill_ids)){
			$t_q .= " UNION ALL ";
		}
	if(!empty($prof_skill_ids)){
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_prof_skills WHERE ";
  $t_q .= implode(" OR ", $prof_skill_ids) . " GROUP BY profile_id";
  }
  

//Certs


$sqlSelectCerts = "SELECT certificate_id, certificate_name FROM certificates";
  $certsResult = mysqli_query($con, $sqlSelectCerts);
  while($certsRow = mysqli_fetch_array($certsResult)) {
    $str = $certsRow['certificate_name'];
    $certNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$certNameNoSpaces])) {
      $certificate_id = $certsRow['certificate_id'];
	  $certificate_ids[] = $certificate_id;
	  
	$matches += 1;
    }
  }
  if(!empty($certificate_ids)){
	  
	  if(!empty($prof_skill_ids) || (!empty($tech_skill_ids))){
			$t_q .= " UNION ALL ";
		}
	  
	  
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_certificates WHERE certificate_id in ";
  $t_q .= "(" . implode(",", $certificate_ids) . ") GROUP BY profile_id";

  }

//job interests 


$sqlSelectJobs = "SELECT job_id, job_name FROM job_interest";
  $jobsResult = mysqli_query($con, $sqlSelectJobs);
  while($jobsRow = mysqli_fetch_array($jobsResult)) {
    $str = $jobsRow['job_name'];
    $jobNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$jobNameNoSpaces])) {
      $job_id = $jobsRow['job_id'];
	  $job_ids[] = $job_id;
	  
		$matches += 1;
    }
  }
  if(!empty($job_ids)){
	  
	  if(!empty($prof_skill_ids) || !empty($tech_skill_ids) || !empty($certificate_ids)){
			$t_q .= " UNION ALL ";
		}
	  
	  
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_jobs WHERE job_id in ";
  $t_q .= "(" . implode(",", $job_ids) . ") GROUP BY profile_id";

  }


//Majors


$sqlSelectMajors = "SELECT major_id, major_name FROM majors";
  $majorsResult = mysqli_query($con, $sqlSelectMajors);
  while($majorsRow = mysqli_fetch_array($majorsResult)) {
    $str = $majorsRow['major_name'];
    $majorNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$majorNameNoSpaces])) {
      $major_id = $majorsRow['major_id'];
	  $major_ids[] = $major_id;
	  
		$matches += 1;
    }
  }
  if(!empty($major_ids)){
	  
	  if(!empty($job_ids) || !empty($prof_skill_ids) || !empty($tech_skill_ids) || !empty($certificate_ids)){
			$t_q .= " UNION ALL ";
		}
	  
	  
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_majors WHERE major_id in ";
  $t_q .= "(" . implode(",", $major_ids) . ") GROUP BY profile_id";

  }
  
  
  
  //attempt to integrate Gen checks
  if(!empty($conditions)){
	  
	  if((!empty($major_ids) || !empty($job_ids) || !empty($prof_skill_ids) || !empty($tech_skill_ids) || !empty($certificate_ids))){
			$t_q .= " UNION ALL ";
		}
		
		
		
  }



//closing of unioned query
$t_q .= ") AS uniontbl GROUP BY profile_id) matchTbl WHERE matches = " . $matches . ";";

 echo $t_q;
 echo "<br>" . $matches;
  
 

  echo "<br>";
  
 $q = $t_q;
  
     //echo $sql;
		If(mysqli_query($con, $t_q)){
        $result = mysqli_query($con, $t_q);
  
  
		$queryResult = mysqli_num_rows($result);
        //Prints result count
		
		
		echo $q . "<br>";
		
			
		
        //Lists all results
        
            echo "Showing ".$queryResult." result(s) for '".$search."':";
          
          echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
            <tr>
            <td style="text-align:left"><b>Profile ID</b></td>
            <td style="text-align:left"><b>First Name</b></td>
            <td style="text-align:left"><b>Middle Initial</b></td>
            <td style="text-align:left"><b>Last Name</b></td>
            <td style="text-align:right"><b>Graduated Y/N</b></td>
            <td style="text-align:right"><b>Graduation Date</b></td>
            <td style="text-align:right"><b>Military Status</b></td>
            <td style="text-align:right"><b>Security Clearance</b></td>
            </tr>';



            // Fetch and print records:
            $bg = '#eeeeee';
			
			foreach($result as $id){
			echo "id:" . $id['profile_id'] . "<br>";
			$q = "select * from students where profile_id = " . $id['profile_id'];
			$presult = mysqli_query($con, $q);
			$row = mysqli_fetch_array($presult, MYSQLI_ASSOC);
			
			echo
              '<tr bgcolor="' . $bg . '">
              <td style="text-align:left"><a href="editstudentform.php?id=' . $row['profile_id'] . '">' . $row['profile_id'] . '</a></td>
              <td style="text-align:left">' . $row['first_name'] . '</td>
              <td style="text-align:left">' . $row['middle_initial'] . '</td>
              <td style="text-align:left">' . $row['last_name'] . '</td>
              <td style="text-align:right">' . $row['graduated'] . '</td>
              <td style="text-align:right">' . $row['graduation_date'] . '</td>
              <td style="text-align:right">' . $row['military_status'] . '</td>
              <td style="text-align:right">' . $row['security_clearance'] . '</td>
              </tr>';
			}		
			
			
			
		}
		
  
     $con->close();
	 
	 include ('../includes/footer.html');
  ?>