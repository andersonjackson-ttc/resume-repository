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
					<label>Military Veteran<br><input name="militaryStatus" type="checkbox" value="<?php if (isset($_POST['militaryStatus'])) echo $_POST['militaryStatus']; ?>"></label>
					<br>
					<label>Security Clearance<br><input name="securityClearance" type="checkbox" value="<?php if (isset($_POST['securityClearance'])) echo $_POST['securityClearance']; ?>"></label>
				</div>
				<div id="radio">
					<label>Work Hours</label>
					<label>Full-Time <input name="workHours" type="radio" value="fullTime"></label>
					<label> Part-Time <input name="workHours" type="radio" value="partTime"></label>
				</div>
				<div id="radio">
					<label>Work Time</label>
					<label>Days <input name="workTime" type="radio" value="days"></label>
					<label>Nights <input name="workTime" type="radio" value="nights"></label>
				</div>
				<!--End first row-->
				<br>
				<!--Begin second row-->
				<div id="inputField">
					<!-- Start of Technical Skills Checkboxes -->
					<div id="techSkills" style="display: inline-block;">
						<ul style="list-style-type: none;">
							<h3>Technical Skills</h3>
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
						</ul>
					</div> <!-- End of Technical Skills Checkboxes -->
				</div>
				<div id="inputField">
					<!-- Start of Professional Skills Ratings -->
					<div id="profSkillsRating" style="display: inline-block; margin-left: 20px;">
						<ul style="list-style-type: none;">
							<h3>Professional Skills</h3>
							<li style="column-count: 2;">
								<div>
									<label><br>Critical Thinking</label>
								</div>
								<div>
									<label for="skillCritThinkingRating"><text>Fair</text><text style="margin-left: 15px;">Good</text><text style="margin-left: 15px;">Excellent</text><br>
										<input type="radio" id="skillCritThinkingRating" name="skillCritThinkingRating" value="fair">
										<input type="radio" id="skillCritThinkingRating" name="skillCritThinkingRating" value="good" style="margin-left: 30px;">
										<input type="radio" id="skillCritThinkingRating" name="skillCritThinkingRating" value="excellent" style="margin-left: 40px;">
									</label>
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Interpersonal Skills</label>
								</div>
								<div>
									<input type="radio" id="skillInterpersonalRating" name="skillInterpersonalRating" value="fair">
									<input type="radio" id="skillInterpersonalRating" name="skillInterpersonalRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillInterpersonalRating" name="skillInterpersonalRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Communication Ability</label>
								</div>
								<div>
									<input type="radio" id="skillCommunicationRating" name="skillCommunicationRating" value="fair">
									<input type="radio" id="skillCommunicationRating" name="skillCommunicationRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillCommunicationRating" name="skillCommunicationRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Professional Attitude and Demeanor</label>
								</div>
								<div>
									<input type="radio" id="skillAttitudeRating" name="skillAttitudeRating" value="fair">
									<input type="radio" id="skillAttitudeRating" name="skillAttitudeRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillAttitudeRating" name="skillAttitudeRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Alertness, Ability to Focus</label>
								</div>
								<div>
									<input type="radio" id="skillAlertnessRating" name="skillAlertnessRating" value="fair">
									<input type="radio" id="skillAlertnessRating" name="skillAlertnessRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillAlertnessRating" name="skillAlertnessRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Agility and Adaptability</label>
								</div>
								<div>
									<input type="radio" id="skillAdaptabilityRating" name="skillAdaptabilityRating" value="fair">
									<input type="radio" id="skillAdaptabilityRating" name="skillAdaptabilityRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillAdaptabilityRating" name="skillAdaptabilityRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Researching Information</label>
								</div>
								<div>
									<input type="radio" id="skillResearchingRating" name="skillResearchingRating" value="fair">
									<input type="radio" id="skillResearchingRating" name="skillResearchingRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillResearchingRating" name="skillResearchingRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Personal Management</label>
								</div>
								<div>
									<input type="radio" id="skillPersManRating" name="skillPersManRating" value="fair">
									<input type="radio" id="skillPersManRating" name="skillPersManRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillPersManRating" name="skillPersManRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Creativity and Innovation</label>
								</div>
								<div>
									<input type="radio" id="skillCreativityRating" name="skillCreativityRating" value="fair">
									<input type="radio" id="skillCreativityRating" name="skillCreativityRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillCreativityRating" name="skillCreativityRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Literacy</label>
								</div>
								<div>
									<input type="radio" id="skillLiteracyRating" name="skillLiteracyRating" value="fair">
									<input type="radio" id="skillLiteracyRating" name="skillLiteracyRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillLiteracyRating" name="skillLiteracyRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Leadership</label>
								</div>
								<div>
									<input type="radio" id="skillLeadershipRating" name="skillLeadershipRating" value="fair">
									<input type="radio" id="skillLeadershipRating" name="skillLeadershipRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillLeadershipRating" name="skillLeadershipRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Stress Management</label>
								</div>
								<div>
									<input type="radio" id="skillStressMgmtRating" name="skillStressMgmtRating" value="fair">
									<input type="radio" id="skillStressMgmtRating" name="skillStressMgmtRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillStressMgmtRating" name="skillStressMgmtRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Study Skills</label>
								</div>
								<div>
									<input type="radio" id="skillStudyRating" name="skillStudyRating" value="fair">
									<input type="radio" id="skillStudyRating" name="skillStudyRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillStudyRating" name="skillStudyRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
							<li style="column-count: 2;">
								<div>
									<label>Honesty and Integrity</label>
								</div>
								<div>
									<input type="radio" id="skillHonestyRating" name="skillHonestyRating" value="fair">
									<input type="radio" id="skillHonestyRating" name="skillHonestyRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillHonestyRating" name="skillHonestyRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
						</ul>
					</div> <!-- End of Professional Skills Ratings -->
				</div>
				<!--End second row-->
				<br>
				<!--Begin third row-->
				<div id="inputField">
					<label>Experience<br></label>
				</div>
				<!--End third row-->
				<br>
				<!--Begin fourth row-->
				<!-- <div id="inputField">
					<label>Education<br><textarea class="education" name="education" type="text"><?php if (isset($_POST['education'])) echo $_POST['education']; ?></textarea></label>
				</div> -->
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
					<label>Majors *<br></label>
				</div>
				<!--End fifth row-->
				<br>
				<!--Begin sixth row-->
				<div id="inputField">
					<label>Certifications<br></label>
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
