<!--Nicholas Justus 11/06/20: This is a basic page that just includes the search bar and filter options-->
<?php
  $page_title = 'Student Search';
  include ('../includes/header.html');
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
<p style="display:flex;justify-content:center;font-style:italic;opacity:0.4;">Hint: Place ! before a search for exact results.</p>
</body>
</html>
