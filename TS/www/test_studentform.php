


		<?php
		$page_title = 'Create a New Student Form';

		include ('../includes/header.html');
		?>
		
		<?php
		  include_once 'src/connection.php';

		?>

		<h1>Create a New Student Form</h1>
		<form name="test_studentform.php" method="POST" action="test_student_submit.php" >
		
		
		<label>First Name *<br><input required name="first" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
		<label>Last Name *<br><input required name="first" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>

		
		
		
			
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
