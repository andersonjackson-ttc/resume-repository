<!--Nicholas Justus 11/06/20: This is a basic page that just includes the search bar-->
<?php
  $page_title = 'Student Search';
  include ('../includes/header.html');
?>

<h1 style="display:flex;justify-content:center;">Search for a Student</h1>

<form action="search_results.php" method="POST" style="display:flex;justify-content:center;">
  <input type="text" name="search" placeholder="Search">
  <button type="submit" name="submit-search">Go</button>
</form>

</body>
</html>
