<!--10/5/20 -->
<!-- <!doctype HTML>
<html> -->
	<head>
		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="newstudentform.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<?php
		$page_title = 'Create a New Student Form';

		include ('../includes/header.html');

		?>
		</head>
		<body>
		<div class="box">

		<form name="test_student_submit.php" method="POST" action="test_student_submit.php">
		<h3>General</h3>
		<fieldset>
		
		<legend>Create a New Student Form</legend>
		
		<label>Student ID <br><input name="studentId" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['studentId'])) echo $_POST['studentId']; ?>" ></label>
		
		<!--Submits-->
		<label>First Name *<br><input required name="firstName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" ></label>
		
		
		<label>MI<br><input name="middleInitial" type="text" size="5" maxlength="100" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>" ></label>

		<!--Submits-->
		<label>Last Name *<br><input required name="lastName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" ></label>


		<label>Email <span class="requiredField">*</span><br><input required name="email" type="email" size="30" maxlength="100" value="<?php if (isset ($_POST['email'])) echo $_POST['email']; ?>" ></label>

		<label>Phone Number <span class="requiredField">*</span><br><input required name="phone" type="phone" size="30" maxlength="100" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" ></label>

		
		
		<div id="inputField" class="checkboxes">
					<ul style="list-style-type: none;">
						
						<div id="radio" style="margin-top: 15px;" class="checkboxes">
		  			  <label style="font-weight: bold">Military Veteran <span class="requiredField">*</span><br></label>
		   			  <label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes"></label>
		  			  <label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no"></label>
						  <br>
		  			</div>
		  			<div id="radio" style="margin-top: 15px;" class="checkboxes">
						<label style="font-weight: bold">Security Clearance <span class="requiredField">*</span></label>
		   			 	<label for="securityClearance"><input id="securityClearanceYes" name="securityClearance" type="radio" value="yes"><span>Yes</span></label>
		  				<label for="securityClearance"><input id="securityClearanceNo" name="securityClearance" type="radio" value="no"><span>No</span></label>
		    			<div id="securityAttributes" style="display: none; margin-top: 5px;">
		      			<label>Select One:
			    				<label for="securityAttributes"><input name="securityAttributes" type="radio" value="secret"><span>Secret</span></label>
			            <label for="securityAttributes"><input name="securityAttributes" type="radio" value="top-secret"><span>Top-Secret</span></label>
			    				<label for="securityAttributes"><input name="securityAttributes" type="radio" value="confidential"><span>Confidential</span></label>
		      			</label>
		      			<label style="font-weight: bold"><br>Currently Active?:
			    				<label for="securityCurrent"><input name="securityCurrent" type="radio" value="yes"><span>Yes</span></label>
			    				<label for="securityCurrent"><input name="securityCurrent" type="radio" value="no"><span>No</span></label>
		      			</label>
		    			</div>
						</div>
						<div id="radio" style="margin-top: 15px;" class="checkboxes">
							<label style="font-weight: bold">Work Hours <span class="requiredField">*</span><br></label>
							<label>Full-Time <input name="workHours" type="radio" value="fullTime"></label>
							<label> Part-Time <input name="workHours" type="radio" value="partTime"></label>
						</div>
						<div id="radio" style="margin-top: 15px;" class="checkboxes">
							<label style="font-weight: bold">Work Time <span class="requiredField">*</span><br></label>
							<label><input name="workTime" type="radio" value="days"><span>Days</span></label>
							<label><input name="workTime" type="radio" value="nights"><span>Nights</span></label>
						</div>
					
				</div>
				
		</div>		
					<!-- Start of Professional Skills Ratings -->
			
						<div >			
						<ul style="list-style-type: none;" class="skills" id="box1">
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
								<div>
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="fair">
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="good" style="margin-left: 30px;">
									<input type="radio" id="skillTroubleshootingRating" name="skillTroubleshootingRating" value="excellent" style="margin-left: 40px;">
								</div>
							</li>
						</ul>
					</div> <!-- End of Professional Skills Ratings -->
			
		<div class="box1">
			<h4>Skills</h4>	
				<?php
			$skillsArr=array('Programming Languages (1 or more)','Project Management','Data Analysis','Technical Writing','Logistics Management', 'Adobe Software', 'CAD Software', 'Bookkeeping Software');
		$arr=array();
		if(isset($_POST['submit'])){
			$arr=$_POST['skills'];
			echo implode(", ",$arr);
			echo "<br/><br/>";
		}
	
		?>
		
			<?php foreach($skillsArr as $list){?>
				<?php if(in_array($list,$arr)){
					?><?php echo $list?> <input checked="checked" type="checkbox" name="skills[]" value="<?php echo $list?>"/><br/><?php
				}else{
					?><?php echo $list?> <input type="checkbox" name="skills[]" value="<?php echo $list?>"/><br/><?php
				}
				?>
			<?php } ?>
			<br/><br/>
			
				
		</div>

							

			<!-- End of Technical Skills Checkboxes -->
                   		
	 
				   										   	
			
<div class="box1">

                    		<h4>Job Interest</h4>	

<?php
			$jobsArr=array('IT Director','Data Analyst','Cyber Security','Application Engineer','Support Specialist', 'Network Engineer', 'Web Developer', 'Database Adminstrator');
		$arr=array();
		if(isset($_POST['submit'])){
			$arr=$_POST['job_interest'];
			echo implode(", ",$arr);
			echo "<br/><br/>";
		}
	
		?>
		
			<?php foreach($jobsArr as $list){?>
				<?php if(in_array($list,$arr)){
					?><?php echo $list?> <input checked="checked" type="checkbox" name="job_interest[]" value="<?php echo $list?>"/><br/><?php
				}else{
					?><?php echo $list?> <input type="checkbox" name="job_interest[]" value="<?php echo $list?>"/><br/><?php
				}
				?>
			<?php } ?>

              			
			
			  				</div><!-- End of Job Interest Checkboxes -->
			
					
		<div class="box1">	
		<div class="checkboxes">
                   		 <h4>Certifications</h4>
		
<?php
			$certificationArr=array('CompTIA A+','Certified Scrum master (CSM)','Certified data professional (CDP)','Certified ethical hacker (CEH)','Project management professional (PMP)', 'CISM – Certified Information Security Manager', 'CISA – Certified Information Systems Auditor', 'ITIL® Foundation ');
		$arr=array();
		if(isset($_POST['submit'])){
			$arr=$_POST['certification'];
			echo implode(", ",$arr);
			echo "<br/><br/>";
		}
	
		?>
		
			<?php foreach($certificationArr as $list){?>
				<?php if(in_array($list,$arr)){
					?><?php echo $list?> <input checked="checked" type="checkbox" name="certification[]" value="<?php echo $list?>"/><br/><?php
				}else{
					?><?php echo $list?> <input type="checkbox" name="certification[]" value="<?php echo $list?>"/><br/><?php
				}
				?>
			<?php } ?>
				<br>
				<br>
              			</div>
						
	</div>
								
				
                		
									
				<br>
				<div class="box1">
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
			</div>
				<!--End fifth row-->
                					
				
			<div class="box2">	
			
                    <h4>Prior Education</h4>
                    <input type="checkbox" id="majors" name="majors" value="majors">
                    <label for="majors">Prior Degrees</label><br>

                    <div id="dvMajorsType" class="checkboxes" style="display: none">

                    <label for="securityAttributes"><input  name="associates" type="checkbox" id="associates" value="<?php if (isset($_POST['associates'])) echo $_POST['associates']; ?>"><span>Associates</span></label>

                    <label for="securityAttributes"><input  name="bacholers" type="checkbox" id="bacholers" value="<?php if (isset($_POST['bacholers'])) echo $_POST['bacholers']; ?>"><span>Bachelors</span></label>

                    <label for="securityAttributes"><input  name="master" type="checkbox" id="master"  value="<?php if (isset($_POST['master'])) echo $_POST['master']; ?>"><span>Masters</span></label>

                    <label for="securityAttributes"><input name="doctorate" type="checkbox" id="bacholers"  value="<?php if (isset($_POST['doctorate'])) echo $_POST['doctorate']; ?>"><span>Doctorate</span></label>

                    <label for="securityAttributes"><input name="phd" type="checkbox" id="phd"  value="<?php if (isset($_POST['phd'])) echo $_POST['phd']; ?>"><span>PHD</span></label><br>

                    </div>

                    <div id="dvMajors" style="display: none">
                        <label>Type of degree:<br><input name="majors" type="text" id="txtMajors" size="30" maxlength="100" value="<?php if (isset($_POST['degree_type'])) echo $_POST['degree_type']; ?>"></label>
                    </div>

                    <div id="dvMajorsSchool" style="display: none">
                        <label>Name of Institution:<br><input name="majors" type="text" id="txtMajorsSchool" size="30" maxlength="100" value="<?php if (isset($_POST['school_name'])) echo $_POST['school_name']; ?>"></label>
                   </div>
					

			</div>
		
			<br>

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
		
		<div class="row px-3 justify-content-end">
			<p><span class="requiredField">*</span> = Required Field</p>
		</div>

		<?php
		include ('../includes/footer.html');
		?>

		<script src="newstudentform.js" type="text/javascript"></script>
