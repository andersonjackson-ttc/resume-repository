//Khalid Smalls

$(document) .ready(function() {
	var $fname = $('input[name="firstName"]').val(),
			$lname = $('input[name="lastName"]').val(),
			$email = $('input[name="studentEmail"]').val(),
			$phoneNum = $('input[name="studentPhone"]').val(),
			emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
			namePattern = /^[A-Za-z]{2,20}$/,
			phonePattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/,
			errorMsg = '',
			errors = 0;

	$('form') .submit(function(event) {
		if (!namePattern.test($fname)) {
			errorMsg += 'First name must be letters or spaces\n';
			errors++;
		}
		if (!namePattern.test($lname)) {
			errorMsg += 'Last name must be letters or spaces\n';
			errors++;
		}
		if (!emailPattern.test($email)) {
			errorMsg += 'Email must be format: example@website.com\n';
			errors++;
		}
		if (!phonePattern.test($phoneNum)) {
			errorMsg += 'Please enter 10 digit phone number\n';
			errors++;
		}

		if(errors > 0) {
			event.preventDefault();
			alert(errorMsg);
		}
	});

});
