<!--Nicholas Justus -->
<!--9/29/20 -->
<!-- <!doctype HTML>
<html>
	<head>
		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<title>Create a New Student Form</title>
	</head>
	<body> -->
		<?php
		include ('../includes/header.html');
		$page_title = 'Create a New Student Form';
		extract($_POST);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			#These double check validity if the HTML 'required' attribute happens to fail or are manually removed with dev mode
			if ((empty($studentID))||(!is_numeric($studentID))){
				echo '<p class="error">Please enter a valid Student ID.</p>';
			}
			if ((empty($firstName))||(is_numeric($firstName))){
				echo '<p class="error">Please enter a valid First Name.</p>';
			}
			if ((empty($lastName))||(is_numeric($lastName))){
				echo '<p class="error">Please enter a valid Last Name.</p>';
			}
			if (empty($studentEmail)){
				echo '<p class="error">Please enter a valid Email Address.</p>';
			}
			if (empty($studentPhone)){
				echo '<p class="error">Please enter a valid Phone Number.</p>';
			}
			if (!isset($_POST['gradStatus'])){
				echo '<p class="error">Please enter a valid Graduation Status.</p>';
			}
			if (empty($_POST['gradDate'])){
				echo '<p class="error">Please enter a Graduation Date.</p>';
			}
			if (empty($_POST['majors'])){
				echo '<p class="error">Please enter (a) Major(s).</p>';
			}
			if (empty($_POST['attachments'])){
				echo '<p class="error">Please attach (a) file(s).</p>';
			}
		}
		?>
		<h1>Create a New Student Form</h1>
		<form method="post" action="newstudentform.php">
			<fieldset>
				<!--Begin first row-->
				<div id="inputField">       <!--The ' value ' attributes below in PHP will keep whatever you entered in place if the page gets reloaded or you submit an incomplete form.-->
					<label>Student ID *<br><input required name="studentID" type="number" size="30" maxlength="100" value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID']; ?>"></label>
				</div>                      <!--Google ignores/overrides ' autocomplete="off" '. Imagine lots of names will be added, flooding the autofill results. This could be an issue-->
				<div id="inputField">       <!--The ' required ' attribute makes the field unable to submit unless it is filled out.-->
					<label>First Name *<br><input required name="firstName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
				</div>
				<div id="inputField">
					<label>MI<br><input name="middleInitial" type="text" size="5" maxlength="100" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Last Name *<br><input required name="lastName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Email *<br><input required name="studentEmail" type="email" size="30" maxlength="100" value="<?php if (isset($_POST['studentEmail'])) echo $_POST['studentEmail']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Phone Number *<br><input required name="studentPhone" type="phone" size="30" maxlength="100" value="<?php if (isset($_POST['studentPhone'])) echo $_POST['studentPhone']; ?>"></label>
				</div>
				<div id="checkbox">
					<label>Military Veteran *<br><input name="militaryStatus" type="checkbox" value="<?php if (isset($_POST['militaryStatus'])) echo $_POST['militaryStatus']; ?>"></label>
					<br>
					<label>Security Clearance *<br><input name="securityClearance" type="checkbox" value="<?php if (isset($_POST['securityClearance'])) echo $_POST['securityClearance']; ?>"></label>
				</div>
				<!--End first row-->
				<br>
				<!--Begin second row-->
				<div id="inputField">
					<label>Technical Skills<br><textarea class="skillsBox" name="techSkills" type="text"><?php if (isset($_POST['techSkills'])) echo $_POST['techSkills']; ?></textarea></label>
					<!-- Start of Technical Skills Checkboxes -->
					<ul style="column-count: 2; list-style-type: none;">
						<li>
							<input type="checkbox" id="skillProgram" name="skillProgram" value="skillProgram">
							<label for="skillProgram">Programming Languages (1 or more)</label>
						</li>
						<li>
							<input type="checkbox" id="skillProject" name="skillProject" value="skillProject">
							<label for="skillProject">Project Management</label>
						</li>
						<li>
							<input type="checkbox" id="skillData" name="skillData" value="skillData">
							<label for="skillData">Data Analysis</label>
						</li>
						<li>
							<input type="checkbox" id="skillWriting" name="skillWriting" value="skillWriting">
							<label for="skillWriting">Technical Writing</label>
						</li>
						<li>
							<input type="checkbox" id="skillLogistics" name="skillLogistics" value="skillLogistics">
							<label for="skillLogistics">Logistics Management</label>
						</li>
						<li>
							<input type="checkbox" id="skillAdobe" name="skillAdobe" value="skillAdobe">
							<label for="skillAdobe">Adobe Software</label>
						</li>
						<li>
							<input type="checkbox" id="skillCad" name="skillCad" value="skillCad">
							<label for="skillCad">CAD Software</label>
						</li>
						<li>
							<input type="checkbox" id="skillBookkeeping" name="skillBookkeeping" value="skillBookkeeping">
							<label for="skillBookkeeping">Bookkeeping Software</label>
						</li>
					</ul> <!-- End of Technical Skills Checkboxes -->
				</div>
				<div id="inputField">
					<label>Professional Skills<br><textarea class="skillsBox" name="profSkills" type="text"><?php if (isset($_POST['profSkills'])) echo $_POST['profSkills']; ?></textarea></label>
					<!-- Start of Professional Skills Checkboxes -->
					<ul style="column-count: 2; list-style-type: none;">
						<li>
							<input type="checkbox" id="skillCritThinking" name="skillCritThinking" value="skillCritThinking">
							<label for="skillCritThinking">Critical Thinking and Problem Solving</label>
						</li>
						<li>
							<input type="checkbox" id="skillInterpersonal" name="skillInterpersonal" value="skillInterpersonal">
							<label for="skillInterpersonal">Interpersonal Skills</label>
						</li>
						<li>
							<input type="checkbox" id="skillCommunication" name="skillCommunication" value="skillCommunication">
							<label for="skillCommunication">Communication Ability</label>
						</li>
						<li>
							<input type="checkbox" id="skillAttitude" name="skillAttitude" value="skillAttitude">
							<label for="skillAttitude">Professional Attitude and Demeanor</label>
						</li>
						<li>
							<input type="checkbox" id="skillAlertness" name="skillAlertness" value="skillAlertness">
							<label for="skillAlertness">Alertness, Ability to Focus</label>
						</li>
						<li>
							<input type="checkbox" id="skillAdaptability" name="skillAdaptability" value="skillAdaptability">
							<label for="skillAdaptability">Agility and Adaptability</label>
						</li>
						<li>
							<input type="checkbox" id="skillResearching" name="skillResearching" value="skillResearching">
							<label for="skillResearching">Researching Information</label>
						</li>
						<li>
							<input type="checkbox" id="skillPersMan" name="skillPersMan" value="skillPersMan">
							<label for="skillPersMan">Personal Management</label>
						</li>
						<li>
							<input type="checkbox" id="skillCreativity" name="skillCreativity" value="skillCreativity">
							<label for="skillCreativity">Creativity and Innovation</label>
						</li>
						<li>
							<input type="checkbox" id="skillLiteracy" name="skillLiteracy" value="skillLiteracy">
							<label for="skillLiteracy">Literacy</label>
						</li>
						<li>
							<input type="checkbox" id="skillLeadership" name="skillLeadership" value="skillLeadership">
							<label for="skillLeadership">Leadership</label>
						</li>
						<li>
							<input type="checkbox" id="skillStressMgmt" name="skillStressMgmt" value="skillStressMgmt">
							<label for="skillStressMgmt">Stress Management</label>
						</li>
						<li>
							<input type="checkbox" id="skillStudy" name="skillStudy" value="skillStudy">
							<label for="skillStudy">Study Skills</label>
						</li>
						<li>
							<input type="checkbox" id="skillHonesty" name="skillHonesty" value="skillHonesty">
							<label for="skillHonesty">Honesty and Integrity</label>
						</li>
					</ul> <!-- End of Professional Skills Checkboxes -->
				</div>
				<!--End second row-->
				<br>
				<!--Begin third row-->
				<div id="inputField">
					<label>Experience<br><textarea class="longBar" name="experience" type="text"><?php if (isset($_POST['experience'])) echo $_POST['experience']; ?></textarea></label>
				</div>
				<!--End third row-->
				<br>
				<!--Begin fourth row-->
				<div id="inputField">
					<label>Education<br><textarea class="education" name="education" type="text"><?php if (isset($_POST['education'])) echo $_POST['education']; ?></textarea></label>
				</div>
				<div id="inputField" class="gradDiv">
					<div>
						<label for="gradStatus">Graduation Status *<br></label>
						<select required name="gradStatus" id="gradStatus" class="gradFields">
							<option disabled selected value="">-- select an option --</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="graduated") echo "selected";?> value="graduated">Graduated</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="notGraduated") echo "selected";?> value="notGraduated">Not Graduated</option>
						</select>
					</div>
					<div>
						<label>Graduation Date *<br><input class="gradFields" required name="gradDate" type="date" value="<?php if (isset($_POST['gradDate'])) echo $_POST['gradDate']; ?>"></label>
					</div>
				</div>
				<!--End fourth row-->
				<br>
				<!--Begin fifth row-->
				<div id="inputField">
					<label>Majors *<br><textarea class="longBar" required name="majors" type="text"><?php if (isset($_POST['majors'])) echo $_POST['majors']; ?></textarea></label>
				</div>
				<!--End fifth row-->
				<br>
				<!--Begin sixth row-->
				<div id="inputField">
					<label>Certifications<br><textarea class="certifications" name="certifications" type="text"><?php if (isset($_POST['certifications'])) echo $_POST['certifications']; ?></textarea></label>
				</div>
				<!--End sixth row-->
				<br>
				<!--Begin seventh row-->
				<div id="inputField">
					<label>Attachments *<br><input required name="attachments" type="file"></label>
				</div>
				<!--End seventh row-->
				<!--Submit button and Exit button-->
				<br>
				<br>
				<input id="finalButton" type="submit" value="Save Form">
				<a href="index.php"><input id="finalButton" type="button" value="Cancel and Exit"></a>
			</fieldset>
		</form>
		<?php
		include ('../includes/footer.html');
		?>
	<!-- </body>
</html> -->
