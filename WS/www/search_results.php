<!--Nicholas Justus 11/06/20: This page prints all the results from search_home.php-->
<?php
  include_once '../src/connection.php';
  $page_title = 'Search Results';
  include ('../includes/header.html');
?>

<div>
<?php
  if (isset($_POST['submit-search'])) {
      //mysqli_real_escape_string to take all inputs as literal strings and prevent manipulation
      //Finds all first names, last names, profile ids, and student ids that contain keywords in the user input, as per Mr. Anderson
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      echo "<button><a href='search_home.php' style='text-decoration:none;'>Return Home</a></button><br>";
      if (($search != null)&&($search != " ")){
        $sql = "SELECT * FROM students WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%' OR profile_id LIKE '%$search%' OR student_id LIKE '%$search%'";
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
          echo "There are no results matching your search!";
        }
      }else{
        echo "<br><p>Error: Search cannot be blank</p><br>";
      }
    }
?>
</div>
