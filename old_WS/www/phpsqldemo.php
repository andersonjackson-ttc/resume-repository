<?php
		$page_title = 'Resume Repository Home';
		include ('../includes/header.html');
?>

<?php
  include_once 'src/test.php';
?>
	
	
<form name="phpsqldemo.php" method="POST" action="entry.php">
<label>First Name *<br><input required name="first" type="text" size="30" maxlength="100" value="<?php if (isset($_POST['first'])) echo $_POST['first']; ?>"></label>
<button type="submit" name="submit">Submit</button>
</form>



<?php
include ('../includes/footer.html');
?>