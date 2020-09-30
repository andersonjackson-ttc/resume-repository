<!--Nicholas Justus -->
<!--9/29/20 -->
<!doctype HTML>
<html>
	<head>
		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<title>Create a New Student Form</title>
	</head>
	<body>
		<?php
		#If we include a header
		#include ('includes/header.html');
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
				<!--End first row-->
				<br>
				<!--Begin second row-->
				<div id="inputField">
					<label>Technical Skills<br><textarea class="skillsBox" name="techSkills" type="text"><?php if (isset($_POST['techSkills'])) echo $_POST['techSkills']; ?></textarea></label>
				</div>
				<div id="inputField">
					<label>Professional Skills<br><textarea class="skillsBox" name="profSkills" type="text"><?php if (isset($_POST['profSkills'])) echo $_POST['profSkills']; ?></textarea></label>
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
						<!--Should Graduation Date always be shown, or only when the status is Graduated? It could be argued that the date would be when someone graduates in the future. Leaving it visible for now, easily reversable-->
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
				<!--Submit button-->
				<br>
				<br><input type="submit" value="Submit Form">
			</fieldset>
		</form>
		<?php
		#If we include a footer
		#include ('includes/footer.html');
		?>
	</body>
</html>
