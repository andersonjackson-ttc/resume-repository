window.onload = function () {
   document.getElementById('securityClearanceYes').addEventListener('click', securityClearanceYes, false);
   document.getElementById('securityClearanceNo').addEventListener('click', securityClearanceNo, false);
   document.getElementById('addEducationBtn').addEventListener('click', addEducation, false);
   document.getElementById('removeEducationBtn').addEventListener('click', removeEducation, false);
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

function addEducation() {
	var pos = document.getElementById('educationBtnDiv');
  var removeBtn = document.getElementById('removeEducationBtn');
  var education = document.getElementsByName('education[]');
  var id = education.length;
	pos.insertAdjacentHTML('beforebegin', '<div class="form-check form-check-inline"' +
  'id="edu'+id+'" name="education[]" style="padding-top: 10px;">' +
	'<select class="form-control" name="majorsType[]" style="width: 30vw;">' +
	'<option value="1">Associates</option>' +
	'<option value="2">Bachelors</option>' +
	'<option value="3">Masters</option>' +
	'<option value="4">PHD</option>' +
	'</select>' +
	'<label class="sr-only" for="txtMajors">Type of degree:</label>' +
	'<input name="majors[]" type="text" class="form-control" style="width: 30vw;" placeholder="Type of Degree"' +
	'value="" maxlength="40">' +
	'<label class="sr-only" for="txtMajorsSchool">Name of Institution:</label>' +
	'<input name="majorsSchool[]" type="text" class="form-control" style="width: 30vw;" placeholder="Name of Institution"' +
	'value="" maxlength="40">' +
	'</div>');
  if(window.getComputedStyle(removeBtn).display === "none") {
    removeBtn.style.display = "inline";
  }
}

function removeEducation() {
  var education = document.getElementsByName('education[]');
  var id = education.length-1;
  $("#edu"+id).remove();
  if(education.length < 2) {
    $('#removeEducationBtn').hide();
  }
}

$(function () {
       		$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajorsType").show();
            	} else {
                $("#dvMajorsType").hide();
            	}
             	});
            	});
            	$(function () {
       		$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajors").show();
            	} else {
                $("#dvMajors").hide();
            	}
             	});
            	});
                  $(function () {
       	 	$("#majors").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvMajorsSchool").show();
            	} else {
                $("#dvMajorsSchool").hide();
            	}
            	 });
            	});

             $(function () {
        	$("#certification").click(function () {
            	if ($(this).is(":checked")) {
                $("#dvCertification").show();
           	 } else {
                $("#dvCertification").hide();
          	  }
          	   });
          	  });
