


		<?php
		$page_title = 'Create a New Student Form';

		include ('../includes/header.html');

		?>
		
		

		<h1>Create a New Student Form</h1>
		<form name="test_studentform.php" method="POST" action="test_student_submit.php">
		
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
                    		<h4>Skills</h4>					
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
					 
			<!--Submit button and Exit button-->
			<button type="submit" name="submit">Submit</button>
			<a href="index.php"><input type="button" value="Cancel and Exit"></a>			
                </div>				

				<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>
			
		</form>

		<?php
		include ('../includes/footer.html');
		?>
