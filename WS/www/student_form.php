<?php
$page_title = 'Create a New Student Form';
session_start();
include ('../includes/header.html');
include '../src/connection.php';
?>
		<style>
		.requiredField{
		color: red;
		font-weight: bold;
		}
		</style>
		<div class="container-fluid">
			<form name="student_form.php" method="POST" action="student_submit.php" enctype="multipart/form-data">
				<br>
				<div class="border border-info" style="background-color: #5bc0de;">
					<div class="form-check" style="padding: 20px;">
						<h1>Create a New Student Form</h1>
						<div class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="studentId">Student ID</label>
								<input name="studentId" id="studentId" type="text" class="form-control" placeholder="Student ID" style="width: 90vw;" value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID']; ?>">
							</div>
						</div>
						<br>

						<div class="form-inline">
							<div class="form-group">
								<label class="sr-only" for="firstName">First Name</label>
								<input required name="firstName" id="firstName" type="text" class="form-control" style="width: 40vw;" placeholder="First Name" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">

								<label class="sr-only" for="middleInitial">MI</label>
								<input name="middleInitial" id="middleInitial" type="text" maxlength="1" class="form-control" style="width: 10vw;" placeholder="MI" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>">

								<label class="sr-only" for="lastName">Last Name</label>
								<input required name="lastName" id="lastName" type="text" class="form-control" style="width: 40vw;" placeholder="Last Name" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
							</div>
						</div>
						<br>

						<div class="form-inline">
							<div class="form-group" style="padding-bottom: 20px;">
								<label class="sr-only" for="studentEmail">Email</label>
								<input required name="studentEmail" id="studentEmail" type="email" class="form-control" style="width: 45vw;" placeholder="Email" value="<?php if (isset($_POST['studentEmail'])) echo $_POST['studentEmail']; ?>">

								<label class="sr-only" for="studentPhone">Phone Number</label>
								<input required name="studentPhone" id="studentPhone" type="phone" class="form-control" style="width: 45vw;" placeholder="Phone Number" value="<?php if (isset($_POST['studentPhone'])) echo $_POST['studentPhone']; ?>">
							</div>
						</div>
					</div>
				</div>
				<br>

				<div class="border border-info">
					<div class="form-check" style="padding-top: 10px;">
						<h4 class="text-muted">General</h4>
				  	<label>Military Veteran <span class="requiredField">*</span><br></label>
				   	<label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes" <?php if (isset($_POST['militaryStatus']) && ($_POST['militaryStatus'] == 'yes')) echo ' checked="checked"'; ?>></label>
				  	<label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no" <?php if (isset($_POST['militaryStatus']) && ($_POST['militaryStatus'] == 'no')) echo ' checked="checked"'; ?>></label>
						<br>
				  </div>

				  <div class="form-check">
						<label>Security Clearance <span class="requiredField">*</span><br></label>
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
						<label>Work Hours <span class="requiredField">*</span><br></label>
						<label>Full-Time <input name="workHours" type="radio" value="2"></label>
						<label> Part-Time <input name="workHours" type="radio" value="1"></label>
					</div>

					<div class="form-check" style="padding-bottom: 10px;">
						<label>Work Time <span class="requiredField">*</span><br></label>
						<label>Days <input name="workTime" type="radio" value="1"></label>
						<label>Nights <input name="workTime" type="radio" value="2"></label>
					</div>
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
						<h4 class="text-muted">Graduation</h4>
						<div class="row align-items-start no-gutters">
							<div class="col col-lg-3">
								<label for="gradStatus">Graduation Status <span class="requiredField">*</span><br></label><br>
								<select name="gradStatus" id="gradStatus" class="gradFields">
									<option disabled selected value="">-- select an option --</option>
									<option <?php if (isset($gradStatus) && $gradStatus=="graduated") echo "selected";?> value="1">Graduated</option>
									<option <?php if (isset($gradStatus) && $gradStatus=="notGraduated") echo "selected";?> value="0">Not Graduated</option>
								</select>
							</div>
							<div class="col col-lg-3">
								<label>Graduation Date <span class="requiredField">*</span><br><input class="gradFields" name="gradDate" type="date" value="<?php if (isset($_POST['gradDate'])) echo $_POST['gradDate']; ?>"></label>
							</div>
						</div>
					</div>
					<div class="form-check" style="padding-top: 10px; padding-bottom: 10px;">
			      <h4 class="text-muted">Prior Education</h4>
						<input type="checkbox" id="majors" name="majors" value="majors">
						<label for="majors">Prior Degrees</label><br>
						<div id="dvMajorsType" class="form-check form-check-inline" style="display: none; padding-bottom: 10px;">
							<select class="form-control" name="dvMajorsType" id="dvMajorsType" style="width: 30vw;">
								<option value="associates">Associates</option>
								<option value="bachelors">Bachelors</option>
								<option value="masters">Masters</option>
								<option value="phd">PHD</option>
					     </select>

							<label class="sr-only" for="txtMajors">Type of degree:</label>
							<input name="majors" type="text" id="txtMajors" class="form-control" style="width: 30vw;" placeholder="Type of Degree" value="<?php if (isset($_POST['degree_type'])) echo $_POST['degree_type']; ?>">

							<label class="sr-only" for="txtMajorsSchool">Name of Institution:</label>
							<input name="majors" type="text" id="txtMajorsSchool" class="form-control" style="width: 30vw;" placeholder="Name of Institution" value="<?php if (isset($_POST['school_name'])) echo $_POST['school_name']; ?>">
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
				<br>
				<div class="form-check">
					<div class="file-field">
    				<div class="btn btn-outline-info waves-effect btn-sm float-left">
      				<span>Choose files</span>
      				<input type="file" name="attachments">
    				</div>
  				</div>
				</div>
				<br><br>

				<div class="form-check">
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
						<a href="index.php"><input class="btn btn-secondary" type="button" value="Cancel and Exit"></a>
	    	</div>
				<br>
			</form>
			<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>
		</div> <!--Close flex-container-->

<script src="newstudentform.js" type="text/javascript"></script>

<?php
include ('../includes/footer.html');
$con->close();
?>
