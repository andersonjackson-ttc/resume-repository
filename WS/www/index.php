

<?php
$page_title = 'Resume Repository Home';
include('../includes/header.html');
?>

<div class="page-header"><h1>Home Page</h1></div>
<hr />

<?php
  if (isset($_SESSION['user_id'])) {
    echo "<h2>Welcome, " . $_SESSION['first_name'] . "!</h2>";
  }
 ?>

<a href="../phpsqldemo.php">PHP Demo</a><br>
<a href="../keyword.php">Edit Demo</a><br>
<a href="../zzz.php">Search Frontend Demo</a><br>



<?php
if (isset($_SESSION['user_id'])) {
  echo '<div class="row justify-content-end mr-2" style="min-height:50vh;"><div class="mt-auto">';
  if (date($_SESSION['last_login_date']) != 0) {
    echo "<p>Last login: " . date_format(new DateTime($_SESSION['last_login_date']), 'm/d/y h:ia') . "</p>";
  } else {
    date_default_timezone_set('America/New_York');
    echo "<p>Last login: " . date('m/d/y h:ia', time()) . "</p>";
  }
  echo '</div></div>';
}

include('../includes/footer.html');
?>
