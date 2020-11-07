<!--Nicholas Justus 11/06/20: Placeholder preview page for a student-->
<?php
  include_once '../src/connection.php';
  $page_title = 'Student Preview';
  include ('../includes/header.html');
?>

<a href='search_home.php' style='text-decoration:none;'><button>Return Home</button></a><br>
<h1>Student Preview</h1>
<h2>PLACEHOLDER PAGE</h2>
<div>
  <?php
    $profile = mysqli_real_escape_string($conn, $_GET['profile']);


    $sql = "SELECT * FROM students WHERE profile_id = '$profile'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0){
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>".$row['first_name']." ".$row['middle_initial']." ".$row['last_name']."'s preview page</p>";
      }
    }
  ?>
</div>


</body>
</html>
