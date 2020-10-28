


		<?php
		$page_title = 'Create a New Student Form';

		include ('../includes/header.html');

		?>
		
		

		<form name="test_studentform.php" method="POST" action="test_student_submit.php">
		<fieldset>
		<legend>Create a New Student Form</legend>
		
		<label>Student ID <br><input name="studentID" type="number" size="30" maxlength="100" value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID']; ?>"></label>
		
		<!--Submits-->
		<label>First Name *<br><input required name="firstName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
		
		
		<label>MI<br><input name="middleInitial" type="text" size="5" maxlength="100" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>"></label>

		<!--Submits-->
		<label>Last Name *<br><input required name="lastName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>


		<label>Email <span class="requiredField">*</span><br><input required name="studentEmail" type="email" size="30" maxlength="100" value="<?php if (isset($_POST['studentEmail'])) echo $_POST['studentEmail']; ?>"></label>

		<label>Phone Number <span class="requiredField">*</span><br><input required name="studentPhone" type="phone" size="30" maxlength="100" value="<?php if (isset($_POST['studentPhone'])) echo $_POST['studentPhone']; ?>"></label>

		
		
		<div id="inputField" class="choiceList">
					<ul style="list-style-type: none;">
						<h3>General</h3>
						<div id="checkbox" style="margin-top: 15px;">
		  			  <label>Military Veteran <span class="requiredField">*</span><br></label>
		   			  <label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes"></label>
		  			  <label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no"></label>
						  <br>
		  			</div>
		  			<div id="checkbox" style="margin-top: 15px;">
							<label>Security Clearance <span class="requiredField">*</span><br></label>
		   			 	<label for="securityClearance">Yes<input id="securityClearanceYes" name="securityClearance" type="radio" value="yes"></label>
		  				<label for="securityClearance">No<input id="securityClearanceNo" name="securityClearance" type="radio" value="no"></label>
		    			<div id="securityAttributes" style="display: none; margin-top: 5px;">
		      			<label>Select One:
			    				<label for="securityAttributes">Secret<input name="securityAttributes" type="radio" value="secret"></label>
			            <label for="securityAttributes">Top-Secret<input name="securityAttributes" type="radio" value="top-secret"></label>
			    				<label for="securityAttributes">Confidential<input name="securityAttributes" type="radio" value="confidential"></label>
		      			</label>
		      			<label><br>Currently Active?:
			    				<label for="securityCurrent">Yes<input name="securityCurrent" type="radio" value="yes"></label>
			    				<label for="securityCurrent">No<input name="securityCurrent" type="radio" value="no"></label>
		      			</label>
		    			</div>
						</div>
						<div id="radio" style="margin-top: 15px;">
							<label>Work Hours <span class="requiredField">*</span><br></label>
							<label>Full-Time <input name="workHours" type="radio" value="fullTime"></label>
							<label> Part-Time <input name="workHours" type="radio" value="partTime"></label>
						</div>
						<div id="radio" style="margin-top: 15px;">
							<label>Work Time <span class="requiredField">*</span><br></label>
							<label>Days <input name="workTime" type="radio" value="days"></label>
							<label>Nights <input name="workTime" type="radio" value="nights"></label>
						</div>
					</ul>
				</div>
				
				
				
				<div class="checkboxes">
                    		<h4>Technical Skills</h4>					
				<?php 		
				
				include '../src/connection.php';
				
				$q = "SELECT * FROM skills;";
				$r = @mysqli_query($con, $q);
					 
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					echo "<input name='skill' type='checkbox' id='skill' value='{$row['skill_id']}'>" . $row['skill_name'] . '</br>'; 	
				}
 				$con->close();
				?>
				<br>
              			</div>
						
						
						
						<!-- Start of Professional Skills Ratings -->
					<div id="profSkillsRating">
						<ul style="list-style-type: none;">
							<h3>Professional Skills</h3>
							<li style="column-count: 2;">
								<div>
									<label><br>Critical Thinking</label>
								</div>
								<div>
									<label for="skillCritThinkingRating"><text>Fair</text><text>Good</text><text>Excellent</text><br>
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
							<li style="column-count: 2;">
								<div>
									<label>Troubleshooting</label>
								</div>
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="fair">
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="excellent" style="margin-left: 40px;">
							</li>
						</ul>
					</div> <!-- End of Professional Skills Ratings -->
				</div>
				
				<div id="inputField" class="choiceList">
					<!-- Job Interest Checkboxes -->
					<div id="jobInterest">
						<ul style="list-style-type: none;">
								<h3>Job Interests</h3>
								<li>
										<input type="checkbox" id="itDirector" name="itDirector" value="itDirector">
										<label for="itDirector">IT Director</label>
								</li>
								<li>
										<input type="checkbox" id="dataAnalyst" name="dataAnalyst" value="dataAnalyst">
										<label for="dataAnalyst">Data Analyst</label>
								</li>
								<li>
										<input type="checkbox" id="cyberSecurity" name="cyberSecurity" value="cyberSecurity">
										<label for="cyberSecurity">Cyber Security</label>
								</li>
								<li>
										<input type="checkbox" id="applicationsEngineer" name="applicationsEngineer" value="applicationsEngineer">
										<label for="applicationsEngineer">Applications Engineer</label>
								</li>
						</ul>
						<ul style="list-style-type: none;">
									<li>
											<input type="checkbox" id="supportSpecialist" name="supportSpecialist" value="supportSpecialist">
											<label for="supportSpecialist">Support Specialist</label>
									</li>
									<li>
											<input type="checkbox" id="networkEngineer" name="networkEngineer" value="networkEngineer">
											<label for="networkEngineer">Network Engineer</label>
									</li>
									<li>
											<input type="checkbox" id="webDeveloper" name="webDeveloper" value="webDeveloper">
											<label for="webDeveloper">Web Developer</label>
									</li>
									<li>
											<input type="checkbox" id="dataAdministrator" name="dataAdministrator" value="dataAdministrator">
											<label for="dataAdministrator">Database Administrator</label>
									</li>
						</ul>
					</div><!-- End of Job Interest Checkboxes -->
				</div>
				
				
                		
				
				<div class="checkboxes">
                    		<h4>Certifications</h4>					
				<?php 		
				
				include '../src/connection.php';
				
				$q = "SELECT * FROM certificates;";
				$r = @mysqli_query($con, $q);
					 
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					echo "<input name='certification' type='checkbox' id='certification' value='{$row['certificate_id']}'>" . $row['certificate_name'] . '</br>'; 	
				}
 				$con->close();
				?>
				<br>
              			</div>
						
						
				<br>
				<div id="inputField" class="eduList">
					<div>
						<label><h3>Graduation</h3></label>
						<label for="gradStatus">Graduation Status <span class="requiredField">*</span><br></label>
						<select name="gradStatus" id="gradStatus" class="gradFields">
							<option disabled selected value="">-- select an option --</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="graduated") echo "selected";?> value="graduated">Graduated</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="notGraduated") echo "selected";?> value="notGraduated">Not Graduated</option>
						</select>
					</div>
					<div>
						<label>Graduation Date <span class="requiredField">*</span><br><input class="gradFields" name="gradDate" type="date" value="<?php if (isset($_POST['gradDate'])) echo $_POST['gradDate']; ?>"></label>
					</div>
				</div>
				<br>
				<!--End fifth row-->
                					
				
				
				<div id="inputField" class="majors">
                    <h4>Prior Education</h4>
                    <input type="checkbox" id="majors" name="majors" value="majors">
                    <label for="majors">Prior Degrees</label><br>

                    <div id="dvMajorsType" class="checkboxes" style="display: none">

                    <label for="securityAttributes"><input  name="associates" type="checkbox" id="associates" size="30" maxlength="100" value="<?php if (isset($_POST['associates'])) echo $_POST['associates']; ?>"><span>Associates</span></label>

                    <label for="securityAttributes"><input  name="bacholers" type="checkbox" id="bacholers" size="30" maxlength="100" value="<?php if (isset($_POST['bacholers'])) echo $_POST['bacholers']; ?>"><span>Bachelors</span></label>

                    <label for="securityAttributes"><input  name="master" type="checkbox" id="master" size="30" maxlength="100" value="<?php if (isset($_POST['master'])) echo $_POST['master']; ?>"><span>Masters</span></label>

                    <label for="securityAttributes"><input name="doctorate" type="checkbox" id="bacholers" size="30" maxlength="100" value="<?php if (isset($_POST['doctorate'])) echo $_POST['doctorate']; ?>"><span>Doctorate</span></label>

                    <label for="securityAttributes"><input name="phd" type="checkbox" id="phd" size="30" maxlength="100" value="<?php if (isset($_POST['phd'])) echo $_POST['phd']; ?>"><span>PHD</span></label><br>

                    </div>

                    <div id="dvMajors" style="display: none">
                        <label>Type of degree:<br><input name="majors" type="text" id="txtMajors" size="30" maxlength="100" value="<?php if (isset($_POST['degree_type'])) echo $_POST['degree_type']; ?>"></label>
                    </div>

                    <div id="dvMajorsSchool" style="display: none">
                        <label>Name of Institution:<br><input name="majors" type="text" id="txtMajorsSchool" size="30" maxlength="100" value="<?php if (isset($_POST['school_name'])) echo $_POST['school_name']; ?>"></label>
                    </div>
					
			<br>
			
			
			<br>

		<div id="inputField">
		<label>Upload Resume <span class="requiredField">*</span><br><input name="attachments" type="file"></label>
		</div>
				<!--Submit button and Exit button-->
				<br>
				<br>

					 
			<!--Submit button and Exit button-->
			<button type="submit" name="submit">Submit</button>
			<a href="index.php"><input type="button" value="Cancel and Exit"></a>			
                </div>
		</fieldset>
		</form>
				<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>		

		<?php
		include ('../includes/footer.html');
		?>
