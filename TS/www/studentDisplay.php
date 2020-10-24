<!--
	Author	:	Dustin White
	Program: StudentResume
	Purpose: Pull from student database and display in table
-->
<?php
// Set page title:
$page_title = 'StudentsTable';

// Add header to page:
include ('../includes/header.html');

// Page header:
echo '<h1>Students</h1>';

// Connect to the db:
require('src/connection.php');

// Records per page:
$display = 25;

// Set how many pages are generated:
if (isset($_GET['p']) && is_numeric($_GET['p']))
{
  $pages = $_GET['p'];
}
else // Record count:
{
  $q = "SELECT COUNT(students) FROM resume_schema;";
  $r = @mysqli_query($dbc, $q);
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
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'last_name';

// Determine the sorting order:
switch ($sort)
{
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
    $order_by = 'last_name ASC';
    $sort = 'rd';
    break;
}

// Define the query:
$q = "SELECT * FROM students ORDER BY $order_by LIMIT $start, $display;";
$r = @mysqli_query ($dbc, $q); // Run query.

// Check to make sure query returns more than 0 records:
if (mysqli_num_rows($r) > 0)
{
  // Table header:
  echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
  <tr>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=fName">First Name</a></b></td>
    <td style="text-align:left"><b><a href="studentDisplay.php?sort=mi">Middle Initial</a></b></td>
    <td style="text-align:right"><b><a href="studentDisplay.php?sort=lName">Last Name</a></b></td>
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
      <td style="text-align:left">' . $row['first_name'] . '</td>
      <td style="text-align:left">' . $row['middle_initial'] . '</td>
      <td style="text-align:right">' . $row['last_name'] . '</td>
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
  echo '<p class="error">There are currently no cities in the database.</p>';
}// END ELSE mysqli_num_rows($r).

// Close and free resources:
mysqli_free_result ($r);
// Close database connection:
mysqli_close($dbc);

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
    echo '<a href="data.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
  }

  // Create all numbered pages:
  for ($i = 1; $i <= $pages; $i++)
  {
    if ($i != $current_page)
    {
      echo '<a href="data.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
    }
      else
      {
        echo $i . ' ';
      }
    }// END for loop.

    // Create next button if not on last page:
    if ($current_page != $pages)
    {
      echo '<a href="data.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
    }

    echo '</p>';
  }// END links section.

// Add footer to page:
include ('../includes/footer.html');
?>
