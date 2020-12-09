<?php
  include ('../includes/header.html');
  include_once '../src/connection.php';


  $gradStatusErr  = $milStatusErr = $clearanceErr = "";
  
  $search = "";

$t_q = "SELECT profile_id from ( ";

$conditions[] = "TRUE";
$orconditions[] = "TRUE";
$matches = 0;
$tech_skill_ids = [];
$prof_skill_ids = [];

  if(isset($_POST['submit'])) {

if(isset($_POST['search'])) {
	
	if(!empty($_POST['search'])) {
		
	$search = $_POST['search'];
	
	
	
	
	}
}

		if(isset($_POST['militaryStatus'])) {
			  switch ($_POST['militaryStatus']) {
				case 'yes':
				  $conditions[] = " military_status=1";
				  break;
				case 'no':
				  //
				  break;
			  }
			}else{
			  //
			}
			if(isset($_POST['securityClearance'])) {
			  switch ($_POST['securityClearance']) {
				case 'yes':
				  if(isset($_POST['securityAttributes'])) {
					switch ($_POST['securityAttributes']) {
					  case 'secret':
						$conditions[] = " security_clearance>=1";
						break;
					  case 'top-secret':
						$conditions[] = " security_clearance>=2";
						break;
					  case 'confidential':
						$conditions[] = " security_clearance=3";
						break;
					}
				  }else{
					//$clearance = 0;
				  }
				  break;
				case 'no':
				 // $clearance = 0;
				  break;
			  }
			}
			
			if(isset($_POST['gradStatus'])) {
			  $gradStatus = $_POST['gradStatus'];
			  if($gradStatus == 1) {
				$conditions[] = " graduated=1";
			}
			if(isset($_POST['workHours'])) {
			  $conditions[] = $_POST['workHours'];
			} 
			if(isset($_POST['workTime'])) {
			  $conditions[] = $_POST['workTime'];
			} 
  }
  
  }//end of isset
  
  /*
  
  SELECT profile_id FROM ### get the profile_ids that match every checkbox (based on the sum of the counts)
(
    SELECT profile_id, SUM(cnt) matches FROM ### sums up the number of matches in the following UNION(s)
    (
            SELECT profile_id, COUNT(*) cnt FROM student_level ### counts every match of comp_id and level
                WHERE (comp_id = 1 AND level >= 0) OR (comp_id = 2 AND level >= 1) ### note AND and OR
                GROUP BY profile_id ### GROUP BY makes it count every time a profile id makes a match
    UNION ALL
            SELECT profile_id, COUNT(*) cnt FROM student_skills ### counts every matching skill id
                WHERE skill_id in (1,3)
                GROUP BY profile_id
    ) AS uniontbl GROUP BY profile_id ### end of the union
) matchTbl WHERE matches = 4; ### matches is the sum of the count
  */
  
  /*foreach($skillsRow['skill_id'] as $skills_row)  {
    $str = $skills_row;
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $skillsRow['skill_id'];
	  $skill_ids[] = $skill_id;
	}
  }*/
 
 $t_q .= "SELECT profile_id, SUM(cnt) matches FROM ("; 
	  
	  
//tech skills
  $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_tech_skills WHERE skill_id in ";
  
  
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
  $t_q .= "(" . implode(",", $tech_skill_ids) . ") GROUP BY profile_id";
  
  
  //union 
  $t_q .= " UNION ALL ";
  //prof skills
 $t_q .= "SELECT profile_id, COUNT(*) cnt FROM student_prof_skills WHERE skill_id in ";
  
  
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM prof_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
  while($skillsRow = mysqli_fetch_array($skillsResult)) {
    $str = $skillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $skillsRow['skill_id'];
	  $prof_skill_ids[] = $skill_id;
	  
		$matches += 1;
    }
  }
  $t_q .= "(" . implode(",", $prof_skill_ids) . ") GROUP BY profile_id";
  
  











//closing of unioned query
$t_q .= ") AS uniontbl GROUP BY profile_id) matchTbl WHERE matches = " . $matches . ";";

//echo $t_q;
 echo "<br>" . $matches;
  
 
/*
  $sqlSelectSkills = "SELECT skill_id, skill_name FROM tech_skills";
  $skillsResult = mysqli_query($con, $sqlSelectSkills);
  while($skillsRow = mysqli_fetch_array($skillsResult)) {
    $str = $skillsRow['skill_name'];
    $skillNameNoSpaces = str_replace(' ', '', $str);
    if(isset($_POST[$skillNameNoSpaces])) {
      $skill_id = $skillsRow['skill_id'];
      
	  $stmt = "SELECT profile_id FROM student_tech_skills WHERE skill_id =$skill_id";
	  $profiles = mysqli_query($con, $stmt);
	  while($profileRow = mysqli_fetch_array($profiles)) {
	  
	  $orconditions[] = "profile_id = " . $profileRow['profile_id'];
	  }
    }
  }
  */
  
 /* foreach($skill_ids as $value){
	  
	  
	  
    echo $value . "<br>";
  }*/
  
//. implode(' OR ', $orconditions)
  echo "<br>";
  
 $q = $t_q;
  
  
  
  
	//$q = "select $ from students where profile_id = $profile_id";
  
  
  
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