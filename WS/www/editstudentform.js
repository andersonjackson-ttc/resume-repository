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