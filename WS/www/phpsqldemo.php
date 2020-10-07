<?php
		include ('../includes/header.html');
		

		<link rel="stylesheet" href="../includes/newstudentform.css" type="text/css" media="screen" />
		<title>Test Form</title>
	
	<body> 

require('../src/test.php');

 // StudentList SQL table:
    $first = $_POST['first'];

    $sql = "INSERT INTO test (fname)
            VALUES ('$first');

    mysqli_query($con, $sql);
	
	header("Location: ../phpsqldemo.php?student_add=success");
	
	
?>	
	
	
<form name="phpsqldemo.php" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>First Name *<br><input required name="first" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['first'])) echo $_POST['first']; ?>"></label>
</form>
<input id="finalButton" type="submit" value="Save Form">



include ('../includes/footer.html');
?>