<!--Nicholas Justus 11/06/20: This is a basic page that just includes the search bar and filter options-->
<?php
  $page_title = 'Student Search';
  include ('../includes/header.html');
?>

<h1 style="display:flex;justify-content:center;">Search for a Student</h1>

<form action="search_results.php" method="POST" style="display:flex;justify-content:center;">
  <div>
    <label><input type="checkbox" name="skillToggle" value="toggle">Non-Student name search</label>
    <br>
  <input type="text" name="search" placeholder="Search">
  <button type="submit" name="submit-search">Go</button>
  </div>
  <div>
  <input type="checkbox" id="filterGraduates" name="filterGraduates" value="Graduates">
  <label for="filterGraduates"> Graduates</label><br>

  <input type="checkbox" id="filterMilitary" name="filterMilitary" value="Military">
  <label for="filterMilitary"> Military</label><br>

  <input type="checkbox" id="filterSecurity" name="filterSecurity" value="Security">
  <label for="filterSecurity"> Security Clearance</label><br>
  </div>
  <div>
  <label> Work Hours
  <input type="radio" name="filterHours" value="1">
  <label for="filterHours"> Part-Time</label>
  <input type="radio" name="filterHours" value="2">
  <label for="filterHours"> Full-Time</label></label><br>

  <label> Work Time
  <input type="radio" name="filterTime" value="1">
  <label for="filterTime"> Days</label>
  <input type="radio" name="filterTime" value="2">
  <label for="filterTime"> Nights</label>
  <input type="radio" name="filterTime" value="3">
  <label for="filterTime"> Both</label></label><br>
  </div>

</form>
<p style="display:flex;justify-content:center;font-style:italic;opacity:0.4;">Hint: Place ! before a search for exact results.</p>
</body>
</html>
