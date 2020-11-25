

<?php
$page_title = 'Resume Repository Home';
session_start();
include('../includes/header.html');
?>

<div class="page-header"><h1>Home Page</h1></div>
<hr />

<?php
  if (isset($_SESSION['user_id'])) {
    echo "<h2>Welcome, " . $_SESSION['first_name'] . "!</h2>";
  }
 ?>

<a href="../phpsqldemo.php">PHP Demo</a>
<a href="../keyword.php">Edit Demo</a>



<?php
  if (isset($_SESSION['user_id'])) {
    echo '<div class="row" style="min-height:50vh;">';
    echo "<p class='col align-self-end row justify-content-end'>Last login: " . $_SESSION['last_login_date'] . "</p></div>";
  }

include('../includes/footer.html');
?>
