window.onload = function () {
   document.getElementById('securityClearanceYes').addEventListener('click', securityClearanceYes, false);
   document.getElementById('securityClearanceNo').addEventListener('click', securityClearanceNo, false);
};

function securityClearanceYes() {
    var div = document.getElementById('securityAttributes');
    div.style.display = "block";
}

function securityClearanceNo() {
    var div = document.getElementById('securityAttributes');
    var radioAttributes = document.getElementsByName('securityAttributes');
    var radioCurrent = document.getElementsByName('securityCurrent');

    for (var i=0; i < radioAttributes.length; i++) {
        if (radioAttributes[i].type == "radio") {
            radioAttributes[i].checked = false;
        }
    }
    for (var i=0; i < radioCurrent.length; i++) {
        if (radioCurrent[i].type = "radio") {
            radioCurrent[i].checked = false;
        }
    }

    div.style.display = "none";
}


$(function() {
  var  $majors = $('#majors'),
       $dvMajors = $('#dvMajors'),
       $dvMajorsType = $('#dvMajorsType'),
       $dvMajorsSchool = $('#dvMajorsSchool'),
       $dvCertification = $('#dvCertification');

  $('.requiredField') .addClass('text-danger');

  $majors .on('click', function () {
      if ($(this).is(":checked")) {
        $dvMajorsType .show();
        $dvMajors.show();
        $dvMajorsSchool.show();
        $dvCertification.show();
      } else {
        $dvMajorsType .hide();
        $dvMajors.hide();
        $dvMajorsSchool.hide();
        $dvCertification.hide();
      }
   });

   $('#floating_submit') .on('click', function(event) {
     event.preventDefault();
     var form_data = $('#new_student_form') .serialize();

     $.ajax({
       type: 'POST',
       url: 'test_student_submit.php',
       data: form_data,
       timeout: 2000,
       success: function(data) {
         $('#confirmation_msg')
         .html('<h1>Registration Successful</h1>')
         .addClass('text-success');
       },
       error: function() {
         $('#confirmation_msg')
         .html('<h1>Registration Unsuccessful</h1>')
         .addClass('text-danger');
       }
     });
   });

});
