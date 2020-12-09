<?php
$page_title = 'Search Students';
include ('../includes/header.html');
include '../src/connection.php';
?>

<div class="container-fluid">
			<form name="filter_home.php" id="filter" method="POST" action="filter_results.php" enctype="multipart/form-data">
				<br>
				<input type="hidden" id="changed" name="changed" value="yes" />
				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding: 20px;">
						<h1>Search</h1>
						
						
						<br>

				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			    	<h4 class="text-muted">Majors</h4>
						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM majors ORDER BY major_name ASC;";
							$r = mysqli_query($con, $q);
							while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								$str = $row['major_name'];
								$majorNameNoSpaces = str_replace(' ', '', $str);
								echo "<div class='col col-lg-3'>
												<input type='checkbox' class='form-check-input' name='".$majorNameNoSpaces.
												"' id='major' value='{$row['major_id']}'>
												<label class='form-check-label' for='{$row['major_id']}'>" . $row['major_name'] .
												"</label>
											</div>";
							} ?>
						</div>
					</div>
				</div>
				<br>
				<div class="border border-info">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			    	<h4 class="text-muted">Technical Skills</h4>
						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM tech_skills ORDER BY skill_name ASC;";
							$r = @mysqli_query($con, $q);

							while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								$str = $row['skill_name'];
								$skillNameNoSpaces = str_replace(' ', '', $str);
								echo "<div class='col col-lg-3'>
												<input type='checkbox' class='form-check-input' name='".$skillNameNoSpaces.
												"' id='skill' value='{$row['skill_id']}'>
												<label class='form-check-label' for='{$row['skill_id']}'>" . $row['skill_name'] .
												"</label>
											</div>";
							}
							?>
						</div>
					</div>
				</div>
				<br>

				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
						<ul class="list-unstyled">
			      <h4 class="text-muted">Professional Skills</h4>
						<?php
						$q = "SELECT * FROM prof_skills ORDER BY skill_nameASC;";
						$r = @mysqli_query($con, $q);

						while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
							$str = $row['skill_name'];
							$skillNameNoSpaces = str_replace(' ', '', $str);
							echo "<li style='column-count: 2;'>
											<div>
												<label>" . $row['skill_name'] . "</label>
											</div>
											<div>
												<input type='radio' name='".$skillNameNoSpaces."' value='1'> Fair
												<input type='radio' name='".$skillNameNoSpaces."' value='2' style='margin-left: 30px;'> Good
												<input type='radio' name='".$skillNameNoSpaces."' value='3' style='margin-left: 30px;'> Excellent
											</div>
										</li>";
						}
						?>
					</div>
				</div>
				<br>

				<div class="border border-info">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
						<h4 class="text-muted">Job Interests</h4>
						<div class="row align-items-start no-gutters">
							<?php
							$q = "SELECT * FROM job_interest ORDER BY job_name ASC;";
							$r = @mysqli_query($con, $q);

							while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								$str = $row['job_name'];
								$jobNameNoSpaces = str_replace(' ', '', $str);
								echo "<div class='col col-lg-3'>
												<input name='".$jobNameNoSpaces."' type='checkbox' id='jobInterest'
												value='{$row['job_id']}'> " . $row['job_name'] .
											"</div>";
							}
							?>
						</div>
					</div>
				</div>
				<br>

				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			      <h4 class="text-muted">Certifications</h4>
						<div class="row align-items-start no-gutters">
							<?php
							$q = "SELECT * FROM certificates ORDER BY certificate_name ASC;";
							$r = @mysqli_query($con, $q);

							while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								$str = $row['certificate_name'];
								$certNameNoSpaces = str_replace(' ', '', $str);
								echo "<div class='col col-lg-3'>
												<input name='".$certNameNoSpaces."' type='checkbox' id='certification'
												value='{$row['certificate_id']}'> " . $row['certificate_name'] .
											"</div>";
							}
							?>
						</div>
					</div>
				</div>
				

				<div class="form-check">
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
						<a href="index.php"><input class="btn btn-secondary" type="button" value="Cancel and Exit"></a>
	    	</div>
				<br>
			</form>
			
		</div> <!--Close flex-container-->
		
	<?php
include ('../includes/footer.html');
$con->close();
?>