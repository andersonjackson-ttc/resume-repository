<!--Nicholas Justus -->
<!--9/29/20 -->
<!-- <!doctype HTML>
<html> -->
	<head>
		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="newstudentform.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        	<script type="text/javascript">
            $(function () {
       		$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajorsType").show();
            	} else {
                $("#dvMajorsType").hide();
            	}
             	});
            	});
            	$(function () {
       		$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajors").show();
            	} else {
                $("#dvMajors").hide();
            	}
             	});
            	});
                  $(function () {
       	 	$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajorsSchool").show();
            	} else {
                $("#dvMajorsSchool").hide();
            	}
            	 });
            	});

             $(function () {
        	$("#certification").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvCertification").show();
           	 } else {
                $("#dvCertification").hide();
          	  }
          	   });
          	  });
        </script>
	</head>
	<!-- <body> -->
		<?php
		include ('../includes/header.html');
		include ('../src/student_submit');
		$page_title = 'Create a New Student Form';
		extract($_POST);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			#declare and initialize error counter variable
			$errors = [];
			#These double check validity if the HTML 'required' attribute happens to fail or are manually removed with dev mode
			if ((empty($_POST['studentID']))||(!is_numeric($_POST['studentID']))){
				$errors[] = '<p class="error">Please enter a valid Student ID.</p>';
			} else {
				  #trims white space and escapes common characters e.g. apostrophes
					$student_id = mysqli_real_escape_string($con, trim($_POST['studentID']));
			}
			if ((empty($_POST['firstName']))||(is_numeric($_POST['firstName']))){
				$errors[] = '<p class="error">Please enter a valid First Name.</p>';
			} else {
				$firstName = mysqli_real_escape_string($con, trim($_POST['firstName']));
			}
			if ((empty($_POST['lastName']))||(is_numeric($_POST['lastName']))){
				$errors[] = '<p class="error">Please enter a valid Last Name.</p>';
			} else {
						$lastName = mysqli_real_escape_string($con, trim($_POST['lastName']));
			}
			if (empty($_POST['studentEmail'])){
				$errors[] = '<p class="error">Please enter a valid Email Address.</p>';
			} else {
				$studentEmail = mysqli_real_escape_string($con, trim($_POST['studentEmail']));
			}
			if (empty($_POST['studentPhone'])){
				$errors[] = '<p class="error">Please enter a valid Phone Number.</p>';
			} else {
				$studentPhone = mysqli_real_escape_string($con, trim($_POST['studentPhone']));
			}
			if (!isset($_POST['gradStatus'])){
				$errors[] = '<p class="error">Please enter a valid Graduation Status.</p>';
			} else {
				$gradStatus = mysqli_real_escape_string($con, trim($_POST['gradStatus']));
			}
			if (empty($_POST['gradDate'])){
				$errors[] = '<p class="error">Please enter a Graduation Date.</p>';
			} else {
				$gradDate = mysqli_real_escape_string($con, trim($_POST['gradDate']));
			}
			if (empty($_POST['majors'])){
				$errors[] = '<p class="error">Please enter (a) Major(s).</p>';
			} else {
				$majors = mysqli_real_escape_string($con, trim($_POST['majors']));
			}
			if (empty($_POST['attachments'])){
				$errors = '<p class="error">Please attach (a) file(s).</p>';
			} else {
				$attachments = $_POST['attachments'];
			}

			if (empty($errors)) {
				require('connection.php');
				//TODO need $q
				$q = '';
				$r = @mysqli_query($con, $q);

				if($r) {
					echo '<script>alert("Submission Successful")</script>';
				}
				else {
					echo '<h1 class="error">Submission Error</h1>
							  <p class="error">Student could not be submitted due to a system error. We apologize for any inconvenience.</p>';
				}
			}
			else {
				echo '<h1 class="error">Error!</h1>;
					  <p class="error">The following error(s) occurred:<br>';
				foreach ($errors as $msg) {
					echo " - $msg<br>\n";
				}
				echo '</p><p class="error">Please try again.</p><p><br></p>';
			}
			mysqli_close($con);
		}
		?>
		<h1>Create a New Student Form</h1>
		<form method="post" action="newstudentform.php">
			<fieldset>
				<div id="inputField">       <!--The ' value ' attributes below in PHP will keep whatever you entered in place if the page gets reloaded or you submit an incomplete form.-->
					<label>Student ID <span class="requiredField">*</span><br><input name="studentID" type="number" size="30" maxlength="100" value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID']; ?>"></label>
				</div>                      <!--Google ignores/overrides ' autocomplete="off" '. Imagine lots of names will be added, flooding the autofill results. This could be an issue-->
				<div id="inputField">       <!--The ' required ' attribute makes the field unable to submit unless it is filled out.-->
					<label>First Name <span class="requiredField">*</span><br><input required name="firstName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
				</div>
				<div id="inputField">
					<label>MI<br><input name="middleInitial" type="text" size="5" maxlength="100" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Last Name <span class="requiredField">*</span><br><input required name="lastName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Email <span class="requiredField">*</span><br><input required name="studentEmail" type="email" size="30" maxlength="100" value="<?php if (isset($_POST['studentEmail'])) echo $_POST['studentEmail']; ?>"></label>
				</div>
				<div id="inputField">
					<label>Phone Number <span class="requiredField">*</span><br><input required name="studentPhone" type="phone" size="30" maxlength="100" value="<?php if (isset($_POST['studentPhone'])) echo $_POST['studentPhone']; ?>"></label>
				</div>
				<hr>
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

				  <div id="inputField" class="checkboxes">
					<!-- Start of Technical Skills Checkboxes -->
					<div id="techSkills">
						
							<h3>Technical Skills</h3>
					
								<br>
				        <label for="skills"><input type="checkbox" id="programmingLanguages" name="skills[]" value="Programming Languages (1 or more)"<?php if(in_array('Programming Languages (1 or more)',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Programming Languages (1 or more)</span></label>
							  
                        
                        		<label for="skills"><input type="checkbox" id="projectManagement" name="skills[]" value="Project Management"<?php if(in_array('rrrrrr',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Project Management</span></label>
							
								
					<label for="skills"><input type="checkbox" id="dataAnalysis" name="skills[]" value="Data Analysis"<?php if(in_array('Data Analysis',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Data Analysis</span></label>
                        
						
				        <label for="skills"><input type="checkbox" id="technicalWriting" name="skills[]" value="Technical Writing"<?php if(in_array('Technical Writing',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Technical Writing</span></label>
                        
						
				        <label for="skills"><input type="checkbox" id="Logistics Management" name="skills[]" value="Logistics Management"<?php if(in_array('Logistics Management',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Logistics Management</span></label>
                        
						
				        <label for="skills"><input type="checkbox" id="Adobe Software" name="skills[]" value="Adobe Software"<?php if(in_array('Adobe Software',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Adobe Software</span></label>
                        
							
				        <label for="skills"><input type="checkbox" id="CAD Software" name="skills[]" value="CAD Software"<?php if(in_array('CAD Software',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>CAD Software</span></label>
                        
						
					<label for="skills"><input type="checkbox" id="programmingLanguages" name="skills[]" value="Bookkeeping Software"<?php if(in_array('Bookkeeping Software',$_POST['skills'])) { echo 'checked="checked"';} ?> />
								<span>Bookkeeping Software</span></label>
                        
					</div> <!-- End of Technical Skills Checkboxes -->
                   		 <?php 
    

				$checkbox1=$_POST['skills'];  
				$chk="";  
				foreach($checkbox1 as $chk1)  
				   {  
				      $chk .= $chk1.",";  
				   }  
				$in_ch=mysqli_query($con,"insert into skills(skills) values ('$chk')");  
				if($in_ch==1)  
				   {  
				      echo'<script>alert("Inserted Successfully")</script>';  
				   }  
				else  
				   {  
				      echo'<script>alert("Failed To Insert")</script>';  
				   }  
 
      				?>
				</div>
				
				<div id="inputField">
					<!-- Start of Professional Skills Ratings -->
					<div id="profSkillsRating">
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
				<input type="checkbox" id="itDirector" name="job_interest[]" value="IT Director"<?php if(in_array('IT Director',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>IT Director</span></label>


				<input type="checkbox" id="dataAnalyst" name="job_interest[]" value="Data Analyst"<?php if(in_array('Data Analyst',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>Data Analyst</span></label>


				<input type="checkbox" id="cyberSecurity" name="job_interest[]" value="Cyber Security"<?php if(in_array('Cyber Security',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>Cyber Security</span></label>


				<input type="checkbox" id="applicationEngineer" name="job_interest[]" value="Applications Engineer"<?php if(in_array('Applications Engineer',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>Applications Engineer</span></label>		


				 <input type="checkbox" id="supportSpecialist" name="job_interest[]" value="Support Specialist"<?php if(in_array('Support Specialist',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>Support Specialist</span></label>


						<input type="checkbox" id="networkEngineer" name="job_interest[]" value="Network Engineer"<?php if(in_array('Network Engineer',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
				<label for="job_interest"><span>Network Engineer</span></label>

				
				<input type="checkbox" id="webDeveloper" name="job_interest[]" value="Web Developer"<?php if(in_array('Web Developer',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
              			<label for="job_interest"><span>Web Developer</span></label>
                        

				 <input type="checkbox" id="databaseAdministrator" name="job_interest[]" value="Database Administrator"<?php if(in_array('Database Administrator',$_POST['job_interest'])) { echo 'checked="checked"';} ?> />
                		<label for="job_interest"><span>Database Administrator</span></label>
					</div><!-- End of Job Interest Checkboxes -->
				     <?php 


			$checkbox1=$_POST['job_interest'];  
			$chk="";  
			foreach($checkbox1 as $chk1)  
			   {  
			      $chk .= $chk1.",";  
			   }  
			$in_ch=mysqli_query($con,"insert into job_interest(job_interest) values ('$chk')");  
			if($in_ch==1)  
			   {  
			      echo'<script>alert("Inserted Successfully")</script>';  
			   }  
			else  
			   {  
			      echo'<script>alert("Failed To Insert")</script>';  
			   }  

			      ?>
			</div>
				<hr>
				<br>
				<div id="inputField" class="eduList">
					<div>
						<label><h3>Graduation</h3></label>
						<label for="gradStatus">Graduation Status <span class="requiredField">*</span><br></label>
						<select required name="gradStatus" id="gradStatus" class="gradFields">
							<option disabled selected value="">-- select an option --</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="graduated") echo "selected";?> value="graduated">Graduated</option>
							<option <?php if (isset($gradStatus) && $gradStatus=="notGraduated") echo "selected";?> value="notGraduated">Not Graduated</option>
						</select>
					</div>
					<div>
						<label>Graduation Date <span class="requiredField">*</span><br><input class="gradFields" required name="gradDate" type="date" value="<?php if (isset($_POST['gradDate'])) echo $_POST['gradDate']; ?>"></label>
					</div>
				</div>
				<br>
				<!--End fifth row-->

                <div id="inputField" class="majors">
                    <h4>Prior Education</h4>
                    <input type="checkbox" id="majors" name="majors" value="majors">
                    <label for="majors">Prior Degrees</label><br>

                    <div id="dvMajorsType" class="checkboxes" style="display: none">

                    <label for="securityAttributes"><input required name="associates" type="checkbox" id="associates" size="30" maxlength="100" value="<?php if (isset($_POST['associates'])) echo $_POST['associates']; ?>"><span>Associates</span></label>

                    <label for="securityAttributes"><input required name="bacholers" type="checkbox" id="bacholers" size="30" maxlength="100" value="<?php if (isset($_POST['bacholers'])) echo $_POST['bacholers']; ?>"><span>Bachelors</span></label>

                    <label for="securityAttributes"><input required name="master" type="checkbox" id="master" size="30" maxlength="100" value="<?php if (isset($_POST['master'])) echo $_POST['master']; ?>"><span>Masters</span></label>

                    <label for="securityAttributes"><input required name="doctorate" type="checkbox" id="bacholers" size="30" maxlength="100" value="<?php if (isset($_POST['doctorate'])) echo $_POST['doctorate']; ?>"><span>Doctorate</span></label>

                    <label for="securityAttributes"><input required name="phd" type="checkbox" id="phd" size="30" maxlength="100" value="<?php if (isset($_POST['phd'])) echo $_POST['phd']; ?>"><span>PHD</span></label><br>

                    </div>

                    <div id="dvMajors" style="display: none">
                        <label>Type of degree:<br><input required name="majors" type="text" id="txtMajors" size="30" maxlength="100" value="<?php if (isset($_POST['degree_type'])) echo $_POST['degree_type']; ?>"></label>
                    </div>

                    <div id="dvMajorsSchool" style="display: none">
                        <label>Name of Institution:<br><input required name="majors" type="text" id="txtMajorsSchool" size="30" maxlength="100" value="<?php if (isset($_POST['school_name'])) echo $_POST['school_name']; ?>"></label>
                    </div><br><br>

                </div>


				<!--Begin sixth row-->


                	<div class="checkboxes">
                   		 <h4>Certifications</h4>
			<input type="checkbox" id="certification" name="certification[]" value="CompTIA A+" <?php if(in_array('CompTIA A+',$_POST['certification'])) { echo 'checked="checked"';} ?> />
			<label for="certification">CompTIA A+</label><br>
			   <input type="checkbox" id="certification" name="certification[]" value="Certified data professional (CDP)" <?php if(in_array('Certified data professional (CDP)',$_POST['certification'])) { echo 'checked="checked"';} ?> />
			<label for="certification">Certified data professional (CDP)</label><br>
			   <input type="checkbox" id="certification" name="certification[]" value="Certified Scrum master (CSM)" <?php if(in_array('Certified Scrum master (CSM)',$_POST['certification'])) { echo 'checked="checked"';} ?> />
			<label for="certification">Certified Scrum master (CSM)</label><br>
			   <input type="checkbox" id="certification" name="certification[]" value="Certified ethical hacker (CEH)" <?php if(in_array('Certified ethical hacker (CEH)',$_POST['certification'])) { echo 'checked="checked"';} ?> />
			<label for="certification">Certified ethical hacker (CEH)</label><br>
			   <input type="checkbox" id="certification" name="certification[]" value="Project management professional (PMP)" <?php if(in_array('Project management professional (PMP)',$_POST['certification'])) { echo 'checked="checked"';} ?> />
			<label for="certification">Project management professional (PMP)</label><br>
			     <?php 


		$checkbox1=$_POST['certification'];  
		$chk="";  
		foreach($checkbox1 as $chk1)  
		   {  
		      $chk .= $chk1.",";  
		   }  
		$in_ch=mysqli_query($con,"insert into certification(certification) values ('$chk')");  
		if($in_ch==1)  
		   {  
		      echo'<script>alert("Inserted Successfully")</script>';  
		   }  
		else  
		   {  
		      echo'<script>alert("Failed To Insert")</script>';  
		   }  

		      ?>
              </div>
                <br>

		<br>

		<div id="inputField">
		<label>Upload Resume <span class="requiredField">*</span><br><input required name="attachments" type="file"></label>
		</div>
				<!--Submit button and Exit button-->
				<br>
				<br>

				<input id="finalButton" type="submit" value="Save Form" style="float: left;">
				<a href="index.php"><input id="finalButton" type="button" value="Cancel and Exit" style="float: left;"></a>
				<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>
			</fieldset>
		</form>
		<?php
		include ('../includes/footer.html');
		?>
	<!-- </body>
</html> -->
