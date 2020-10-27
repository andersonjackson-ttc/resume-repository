


		<?php
		$page_title = 'Create a New Student Form';

		include ('../includes/header.html');

		?>
		
		

		<h1>Create a New Student Form</h1>
		<form name="test_studentform.php" method="POST" action="test_student_submit.php">
		
		<label>Student ID <br><input name="studentID" type="number" size="30" maxlength="100" value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID']; ?>"></label>
		<br>
		
		<label>First Name *<br><input required name="firstName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
		<br>
		
		<label>MI<br><input name="middleInitial" type="text" size="5" maxlength="100" value="<?php if (isset($_POST['middleInitial'])) echo $_POST['middleInitial']; ?>"></label>

		
		<label>Last Name *<br><input required name="lastName" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>


		<label>Email <span class="requiredField">*</span><br><input required name="studentEmail" type="email" size="30" maxlength="100" value="<?php if (isset($_POST['studentEmail'])) echo $_POST['studentEmail']; ?>"></label>

		
		
		
			
				<!--Submit button and Exit button-->
				<br>
				<br>

				<button type="submit" name="submit" style="float: left;">Submit</button>
				<a href="index.php"><input type="button" value="Cancel and Exit" style="float: left;"></a>
				<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>
			
		</form>

		<?php
		include ('../includes/footer.html');
		?>
