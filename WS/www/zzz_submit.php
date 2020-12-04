<?php
  include ('../includes/header.html');
  include_once '../src/connection.php';
  include 'student_submit_functions.php';

  $gradStatusErr  = $milStatusErr = $clearanceErr = "";
  
  $search = "";

$q = "SELECT * from STUDENTS";

$conditions[] = "TRUE";
$orconditions[] = "TRUE";


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
  
//. implode(' OR ', $orconditions)
  
  
 $q = "SELECT * FROM students WHERE " . implode(' AND ', $conditions) . " AND (first_name='$search' OR last_name='$search' OR CONCAT(first_name, ' ', last_name)='$search' OR
            CONCAT(first_name, ' ', middle_initial, ' ', last_name)='$search' OR profile_id='$search') AND " . implode(' OR ', $orconditions);
  
  
  
  
  
  
  
  
  
     //echo $sql;
        $result = mysqli_query($con, $q);
  
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
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
              $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
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
       
  
     $con->close();
	 
	 include ('../includes/footer.html');
  ?>