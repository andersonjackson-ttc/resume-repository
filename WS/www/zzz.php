<?php
$page_title = 'Search Students';
include ('../includes/header.html');
include '../src/connection.php';
?>

<div class="container-fluid">
			<form name="zzz.php" id="zzzform" method="POST" action="zzz_submit.php" enctype="multipart/form-data">
				<br>
				<input type="hidden" id="changed" name="changed" value="yes" />
				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding: 20px;">
						<h1>Search</h1>
						
						

						<div class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="search">Search</label>
								<input name="search" id="search" type="text" class="form-control" style="width: 40vw;" placeholder="Use . for exact search" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>">

							</div>
						</div>
						<br>

					</div>
				</div>
				<br>

				<div class="border border-info">
					<div class="form-check" style="padding-top: 10px;">
						<h4 class="text-muted">General</h4>
				  	<label>Military Veteran <span  >*</span><br></label>
				   	<label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes" <?php if (isset($_POST['militaryStatus']) && ($_POST['militaryStatus'] == 'yes')) echo ' checked="checked"'; ?>></label>
				  	<label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no" <?php if (isset($_POST['militaryStatus']) && ($_POST['militaryStatus'] == 'no')) echo ' checked="checked"'; ?>></label>
						<br>
				  </div>

				  <div class="form-check">
						<label>Security Clearance <span  > </span><br></label>
				   	<label for="securityClearance">Yes<input id="securityClearanceYes" name="securityClearance" type="radio" value="yes"></label>
				  	<label for="securityClearance">No<input id="securityClearanceNo" name="securityClearance" type="radio" value="no"></label>
				    <div id="securityAttributes" style="display: none; margin-top: 5px;">
							<label for="securityAttributes">Clearance Level:</label>
							<select class="form-control" name="securityAttributes" id="securityAttributes" style="width: 30vw;">
								<option value="secret">Secret</option>
								<option value="top-secret">Top-Secret</option>
								<option value="confidential">Confidential</option>
				      </select></br>
				      <label>Currently Active?:
					    	<label for="securityCurrent">Yes<input name="securityCurrent" type="radio" value="yes"></label>
					    	<label for="securityCurrent">No<input name="securityCurrent" type="radio" value="no"></label>
				      </label>
				    </div>
					</div>

					<div class="form-check">
						<label>Work Hours <span  > </span><br></label>
						<label>Full-Time <input name="workHours" type="radio" value="2"></label>
						<label> Part-Time <input name="workHours" type="radio" value="1"></label>
					</div>

					<div class="form-check" style="padding-bottom: 10px;">
						<label>Work Time <span  > </span><br></label>
						<label>Days <input name="workTime" type="radio" value="1"></label>
						<label>Nights <input name="workTime" type="radio" value="2"></label>
						<label>Both <input name="workTime" type="radio" value="3"></label>
					</div>
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
						<h4 class="text-muted">Graduation</h4>
						<div class="row align-items-start no-gutters">
							<div class="col col-lg-3">
								<label for="gradStatus">Graduation Status <span  > </span><br></label><br>
								<select name="gradStatus" id="gradStatus" class="gradFields">
									<option disabled selected value="">-- select an option --</option>
									<option <?php if (isset($gradStatus) && $gradStatus=="graduated") echo "selected";?> value="1">Graduated</option>
									<option <?php if (isset($gradStatus) && $gradStatus=="notGraduated") echo "selected";?> value="0">Not Graduated</option>
								</select>
							</div>
							<div class="col col-lg-3">
							</div>
						</div>
					</div>
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			      <h4 class="text-muted">Prior Education</h4>
						<div id="dvMajorsType" class="form-check" style=" padding-bottom: 10px;">
							<div class="form-check form-check-inline" name="education[]">
							<select class="form-control" name="majorsType[]" style="width: 30vw;">
								<option value="1">Associates</option>
								<option value="2">Bachelors</option>
								<option value="3">Masters</option>
								<option value="4">PHD</option>
					     </select>
						</div>
					</div>
				</div>
				<br>
				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			    	<h4 class="text-muted">Majors</h4>
						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM majors";
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
							$q = "SELECT * FROM tech_skills;";
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
						$q = "SELECT * FROM prof_skills;";
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
							$q = "SELECT * FROM job_interest;";
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
							$q = "SELECT * FROM certificates;";
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