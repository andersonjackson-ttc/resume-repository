<!--Nicholas Justus 11/06/20: This page prints all the results from search_home.php-->
<?php
  include_once '../src/connection.php';
  $page_title = 'Search Results';
  include ('../includes/header.html');
?>

<div>
<?php
  if (isset($_POST['submit-search'])) {
    if(isset($_POST['skillToggle'])){
      $search = mysqli_real_escape_string($con, $_POST['search']);
      echo "<br>
      <a href='search_home.php'><input class='btn btn-secondary' type='button'
      name='return' value='Return Home'></a>
      <br>";
      if ((($search != null)&&($search != " "))){
        if (strpos($search, '!')===0){
          $search = trim($search, '!');
          $sql = "SELECT prof_skills.skill_name, certificates.certificate_name, job_interest.job_name, majors.major_name, tech_skills.skill_name, students.profile_id AS 'profile_id',
          students.student_id AS 'student_id', students.first_name AS 'first_name', students.middle_initial AS 'middle_initial',
          students.last_name AS 'last_name', students.email AS 'email', students.phone AS 'phone', students.graduated AS 'graduated',
          students.graduation_date AS 'graduation_date', students.military_status AS 'military_status', students.security_clearance AS 'security_clearance',
          students.work_hours AS 'work_hours', students.work_time AS 'work_time'
          FROM ((((((((((students
          LEFT OUTER JOIN student_tech_skills ON students.profile_id = student_tech_skills.profile_id)
          LEFT OUTER JOIN tech_skills ON student_tech_skills.skill_id = tech_skills.skill_id)
          LEFT OUTER JOIN student_prof_skills ON students.profile_id = student_prof_skills.profile_id)
          LEFT OUTER JOIN prof_skills ON student_prof_skills.skill_id = prof_skills.skill_id)
          LEFT OUTER JOIN student_certificates ON students.profile_id = student_certificates.profile_id)
          LEFT OUTER JOIN certificates ON student_certificates.certificate_id = certificates.certificate_id)
          LEFT OUTER JOIN student_majors ON students.profile_id = student_majors.profile_id)
          LEFT OUTER JOIN majors ON student_majors.major_id = majors.major_id)
          LEFT OUTER JOIN student_jobs ON students.profile_id = student_jobs.profile_id)
          LEFT OUTER JOIN job_interest ON student_jobs.job_id = job_interest.job_id)
          WHERE prof_skills.skill_name='$search'
          OR tech_skills.skill_name='$search'
          OR certificates.certificate_name='$search'
          OR majors.major_name='$search'
          OR job_interest.job_name='$search'
          GROUP BY students.profile_id";
        } else {
          $sql = "SELECT prof_skills.skill_name, certificates.certificate_name, job_interest.job_name, majors.major_name, tech_skills.skill_name, students.profile_id AS 'profile_id',
          students.student_id AS 'student_id', students.first_name AS 'first_name', students.middle_initial AS 'middle_initial',
          students.last_name AS 'last_name', students.email AS 'email', students.phone AS 'phone', students.graduated AS 'graduated',
          students.graduation_date AS 'graduation_date', students.military_status AS 'military_status', students.security_clearance AS 'security_clearance',
          students.work_hours AS 'work_hours', students.work_time AS 'work_time'
          FROM ((((((((((students
          LEFT OUTER JOIN student_tech_skills ON students.profile_id = student_tech_skills.profile_id)
          LEFT OUTER JOIN tech_skills ON student_tech_skills.skill_id = tech_skills.skill_id)
          LEFT OUTER JOIN student_prof_skills ON students.profile_id = student_prof_skills.profile_id)
          LEFT OUTER JOIN prof_skills ON student_prof_skills.skill_id = prof_skills.skill_id)
          LEFT OUTER JOIN student_certificates ON students.profile_id = student_certificates.profile_id)
          LEFT OUTER JOIN certificates ON student_certificates.certificate_id = certificates.certificate_id)
          LEFT OUTER JOIN student_majors ON students.profile_id = student_majors.profile_id)
          LEFT OUTER JOIN majors ON student_majors.major_id = majors.major_id)
          LEFT OUTER JOIN student_jobs ON students.profile_id = student_jobs.profile_id)
          LEFT OUTER JOIN job_interest ON student_jobs.job_id = job_interest.job_id)
          WHERE prof_skills.skill_name LIKE '%$search%'
          OR tech_skills.skill_name LIKE '%$search%'
          OR certificates.certificate_name LIKE '%$search%'
          OR majors.major_name LIKE '%$search%'
          OR job_interest.job_name LIKE '%$search%'
          GROUP BY students.profile_id";
        }

        //echo $sql;
        $result = mysqli_query($con, $sql);
        $queryResult = mysqli_num_rows($result);
        //Prints result count
        //Lists all results
        if ($queryResult > 0) {
          if (($search == null)||($search == " ")){
            echo "Showing ".$queryResult." result(s):";
          }else{
            echo "Showing ".$queryResult." result(s) for '".$search."':";
          }
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

        } else {
          echo "There are no results matching '".$search."'.";
        }

      } else {
        echo "<br><p>Error: Search cannot be blank</p><br>";
      }

    } else {
      //mysqli_real_escape_string to take all inputs as literal strings and prevent manipulation
      $search = mysqli_real_escape_string($con, $_POST['search']);
      echo "<br>
      <a href='search_home.php'><input class='btn btn-secondary' type='button'
      name='return' value='Return Home'></a>
      <br>";

      $conditions = array();

      //Checking if a filter option has been chosen, then adding it to the array
      //Easily extendable by copy/pasting, just make sure there is a corresponding html button
      //Graduates Only
      if (!empty($_POST['filterGraduates'])){
        $conditions[] = " graduated=1";
      }
      //Military Only
      if (!empty($_POST['filterMilitary'])){
        $conditions[] = " military_status=1";
      }

      //Security Clearance Only
      if (!empty($_POST['filterSecurity'])){
        $conditions[] = " security_clearance>=1";
      }

      //Work Hours only
      if (!empty($_POST['filterHours'])){
        if($_POST['filterHours']==1) {
          $conditions[] = " work_hours=1";
        } else {
          $conditions[] = " work_hours=2";
        }
      }

      //Work Time only
      if (!empty($_POST['filterTime'])){
        if($_POST['filterTime']==1) {
          $conditions[] = " work_time=1";
        } else if($_POST['filterTime']==2){
          $conditions[] = " work_time=2";
        } else {
          $conditions[] = " work_time=3";
        }
      }

      //Actual search happens here:
      //If search is not empty
      //Finds all first names, last names, full names, first + last names, profile ids, and student ids that contain keywords in the user input, as per Mr. Anderson
      //Starting a search with ! will only return exact matches instead of anything containing the search, similar to typing "" in google
      //If The search is not blank OR if there are any filters (You can submit an empty search if a filter is chosen)
      if ((($search != null)&&($search != " "))||(count($conditions)) > 0){
        if (strpos($search, '!')===0){   //If search started with an ! (Exact results only)
          $search = trim($search, '!');  //Cut off the ! for variable and printing purposes
          if ((isset($conditions))&&(count($conditions)) > 0) {   //If the conditions array is populated and there are any conditions
            $sql = "SELECT * FROM students WHERE " . implode(' AND ', $conditions) . " AND (first_name='$search' OR last_name='$search' OR CONCAT(first_name, ' ', last_name)='$search' OR
            CONCAT(first_name, ' ', middle_initial, ' ', last_name)='$search' OR profile_id='$search')";
          }else{
            $sql = "SELECT * FROM students WHERE first_name='$search' OR last_name='$search' OR CONCAT(first_name, ' ', last_name)='$search' OR
            CONCAT(first_name, ' ', middle_initial, ' ', last_name)='$search' OR profile_id='$search'";
          }
        }else{  //Else use keyword search
          if ((isset($conditions))&&(count($conditions)) > 0) {
            $sql = "SELECT * FROM students WHERE " . implode(' AND ', $conditions) . " AND (first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%' OR
            CONCAT(first_name, ' ', middle_initial, ' ', last_name) LIKE '%$search%' OR profile_id LIKE '%$search%' OR student_id LIKE '%$search%')";
          }else{
            $sql = "SELECT * FROM students WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%' OR
            CONCAT(first_name, ' ', middle_initial, ' ', last_name) LIKE '%$search%' OR profile_id LIKE '%$search%' OR student_id LIKE '%$search%'";
          }
        }

        //echo $sql;
        $result = mysqli_query($con, $sql);
        $queryResult = mysqli_num_rows($result);
        //Prints result count
        //Lists all results
        if ($queryResult > 0) {
          if (($search == null)||($search == " ")){
            echo "Showing ".$queryResult." result(s):";
          }else{
            echo "Showing ".$queryResult." result(s) for '".$search."':";
          }
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
        }else{
          echo "There are no results matching '".$search."'.";
        }
      }else{
        echo "<br><p>Error: Search cannot be blank</p><br>";
      }
    }
    $con->close();
  }

?>
</div>
