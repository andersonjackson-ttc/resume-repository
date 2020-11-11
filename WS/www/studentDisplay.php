<!--
	Author	:	Dustin White
	Program: StudentResume
	Purpose: Pull from student database and display in table
-->
<?php
$page_title = 'StudentsTable';

// Add header to page:
include ('../includes/header.html');

// Page header:
echo '<h1>Students</h1>';

// Connect to the db:
require('../src/connection.php');

?>

<h1 style="display:flex;justify-content:center;">Search for a Student</h1>

<form action="search_results.php" method="POST" style="display:flex;justify-content:center;">
  <input type="text" name="search" placeholder="Search">
  <button type="submit" name="submit-search">Go</button>

  <input type="checkbox" id="filterGraduates" name="filterGraduates" value="Graduates">
  <label for="filterGraduates"> Graduates</label><br>

  <input type="checkbox" id="filterMilitary" name="filterMilitary" value="Military">
  <label for="filterMilitary"> Military</label><br>

  </select>
</form>

<?php


if (isset($_POST['submit-search'])) {
      //mysqli_real_escape_string to take all inputs as literal strings and prevent manipulation
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      echo "<a href='search_home.php' style='text-decoration:none;'><button>Return Home</button></a><br>";

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

      //Actual search happens here:
      //If search is not empty
      //Finds all first names, last names, profile ids, and student ids that contain keywords in the user input, as per Mr. Anderson
      //Starting a search with ! will only return exact matches instead of anything containing the search, similar to typing "" in google
      if (($search != null)&&($search != " ")){
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
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        //Prints result count
        //Lists all results
        if ($queryResult > 0) {
          echo "Showing ".$queryResult." result(s) for '".$search."':";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <div style='border:2px solid black;margin-bottom:8px;'>
              <a href='student_preview.php?profile=".$row['profile_id']."'>
              <p>Name: ".$row['first_name']." ".$row['middle_initial']." ".$row['last_name']."</p>
              <p>Profile ID: ".$row['profile_id']."</p>
              <p>Student ID: ".$row['student_id']."</p>
              <p>Email: ".$row['email']."</p>
              <p>Phone: ".$row['phone']."</p>";
              if ($row['graduated'] == 1){
                echo "<p>Graduated: Yes</p>
                <p>Graduation Date: ".$row['graduation_date']."</p>";
              }else{
                echo "<p>Graduated: No</p>";
              }
              if ($row['military_status'] == 1){
                echo "<p>Military: Yes</p>";
              }else{
                echo "<p>Military: No</p>";
              }
            echo "</div>";
          }
        }else{
          echo "There are no results matching '".$search."'.";
        }
      }else{
        echo "<br><p>Error: Search cannot be blank</p><br>";
      }
  
  }


/////////////////////////////////
// Set page title:


// Records per page:
$display = 25;

// Set how many pages are generated:
if (isset($_GET['p']) && is_numeric($_GET['p']))
{
  $pages = $_GET['p'];
}
else // Record count:
{
  $q = "SELECT COUNT(profile_id) FROM students;";
  $r = @mysqli_query($con, $q);
  $row = @mysqli_fetch_array ($r, MYSQLI_NUM);
  $records = $row[0];
  // Calc. number of pages:
  if ($records > $display)
  {
    $pages = ceil ($records/$display);
  }
  else
  {
    $pages = 1;
  }
} // END 'p' IF.

// Determine where in database to return results:
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
  $start = $_GET['s'];
}
else
{
  $start = 0;
}

// Default sort by city name:
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'profile_id';

// Determine the sorting order:
switch ($sort)
{
  case 'profileId':
    $order_by = 'profile_id ASC';
    break;
  case 'fName':
    $order_by = 'first_name ASC';
    break;
  case 'mi':
    $order_by = 'middle_initial ASC';
    break;
  case 'lName':
    $order_by = 'last_name ASC';
    break;
  case 'grad':
    $order_by = 'graduated ASC';
    break;
  case 'graduationDate':
    $order_by = 'graduation_date ASC';
    break;
  case 'milStatus':
    $order_by = 'military_status ASC';
    break;
  case 'clearance':
    $order_by = 'security_clearance ASC';
    break;
  default:
    $order_by = 'profile_id ASC';
    $sort = 'rd';
    break;
}

// Define the query:
$q = "SELECT * FROM students ORDER BY $order_by LIMIT $start, $display;";
$r = @mysqli_query ($con, $q); // Run query.

// Check to make sure query returns more than 0 records:
if (mysqli_num_rows($r) > 0)
{
  // Table header:
  echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
  <tr>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=profileId">Profile ID</a></b></td>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=fName">First Name</a></b></td>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=mi">Middle Initial</a></b></td>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=lName">Last Name</a></b></td>
    <td style="text-align:right"><b><a href="studentDisplay.php?sort=grad">Graduated Y/N</a></b></td>
    <td style="text-align:right"><b><a href="studentDisplay.php?sort=graduationDate">Graduation Date</a></b></td>
    <td style="text-align:right"><b><a href="studentDisplay.php?sort=milStatus">Military Status</a></b></td>
    <td style="text-align:right"><b><a href="studentDisplay.php?sort=clearance">Security Clearance</a></b></td>
    </tr>';

    // Fetch and print records:
    $bg = '#eeeeee';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
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
    } // END WHILE loop.

    // Close the table.
    echo '</table>';

  }// END IF mysqli_num_rows($r).
else
{
  echo '<p class="error">There are currently no students in the database.</p>';
}// END ELSE mysqli_num_rows($r).

// Close and free resources:
mysqli_free_result ($r);
// Close database connection:
mysqli_close($con);

// Links to other pages if needed.
if ($pages > 1)
{
  // Add some spacing and start a paragraph:
  echo '<br /><p>';
  // Determine what page script is on:
  $current_page = ($start/$display) + 1;

  // Create previous button if not on first page:
  if ($current_page != 1)
  {
    echo '<a href="studentDisplay.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
  }

  // Create all numbered pages:
  for ($i = 1; $i <= $pages; $i++)
  {
    if ($i != $current_page)
    {
      echo '<a href="studentDisplay.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
    }
      else
      {
        echo $i . ' ';
      }
    }// END for loop.

    // Create next button if not on last page:
    if ($current_page != $pages)
    {
      echo '<a href="studentDisplay.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
    }

    echo '</p>';
  }// END links section.


  
  // Add footer to page:
include ('../includes/footer.html');
?>
