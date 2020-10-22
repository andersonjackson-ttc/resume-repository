	<head>
		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="newstudentform.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	</head>

	<!-- <body> -->
		<?php
		include ('../includes/header.html');
		include ('../src/NEWstudent_submit');
		$page_title = 'Create a New Student Form';
		?>

		<h1>Create a New Student Form</h1>
		<form name="newstudentform.php"  method="post" action="src/NEWstudent_submit.php">
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

				<hr><br>

		<div id="inputField">
		<label>Upload Resume <span class="requiredField">*</span><br><input required name="resume" type="file"></label>
		</div>
				<!--Submit button and Exit button-->
				<br>
				<br>

				<button id="finalButton" type="submit" name="submit" style="float: left;">Submit</button>
				<a href="index.php"><input id="finalButton" type="button" value="Cancel and Exit" style="float: left;"></a>
				<div style="float: right;"><span class="requiredField">*</span> = Required Field</div>
			</fieldset>
		</form>

		<?php
		include ('../includes/footer.html');
		?>
