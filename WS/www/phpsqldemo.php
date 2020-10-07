<?php
		$page_title = 'Resume Repository Home';
		include ('../includes/header.html');
?>

<?php
	

require('../src/test.php');


    $first = $_POST['first'];

    $sql = "INSERT INTO test (fname) VALUES ('$first')";

    mysqli_query($con, $sql);
	
	header("Location: ../phpsqldemo.php?student_add=success");
	
	
?>	
	
	
<form name="phpsqldemo.php" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>First Name *<br><input required name="first" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['first'])) echo $_POST['first']; ?>"></label>
</form>
<input id="finalButton" type="submit" value="Save Form">


<?php
include ('../includes/footer.html');
?>