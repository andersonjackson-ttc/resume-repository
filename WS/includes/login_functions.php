<?php
//Redirect user to absolute URL
function redirect_user($page = 'index.php') {
  //Create URL definition
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	//Sprucing up the URL
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	//Redirect to url value
	header("Location: $url");
	exit();
}

function check_login($con, $user_email = '', $user_password = '') {

	$errors = [];
	//Email
	if (empty($user_email)) {
		$errors[] = 'No email has been entered.';
	} else {
		$e = mysqli_real_escape_string($con, trim($user_email));
	}
	//Password
	if (empty($user_password)) {
		$errors[] = 'No password has been entered.';
	} else {
		$p = mysqli_real_escape_string($con, trim($user_password));
	}

	if (empty($errors)) {
		//Find the user that matches input information
		$query = "SELECT user_id, first_name, user_password, user_level, last_login_date FROM users WHERE user_email='$e' AND user_password=SHA1('$p')";
		$result = @mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			return [true, $row];
		} else {
			$errors[] = 'You have entered an invalid email or password.';
		}
	}
	return [false, $errors];
}
