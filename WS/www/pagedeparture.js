/*
	Author:	Khadijah Thompson
	Program: ResumeRespository
	Purpose: Displays warning if user tries to leave page without submitting changes
*/

//Function for checking if any changes have been made to the form
function FormChanges(form)
   {
           if (typeof form == "string")
           {
               form = document.getElementById(form);
           }

           if(!form || !form.nodeName || form.nodeName.toLowerCase() != "form")
           {
               return null;
           }

           var changed = [], n, c, def, o, ol, opt;

           for (var e = 0, el = form.elements.length; e < el; e++)
           {
               n = form.elements[e];
               c = false;

               switch (n.nodeName.toLowerCase())
               {
                   // select boxes
                   case "select":
                       def = 0;
                       for (o = 0, ol = n.options.length; o < ol; o++) {
                           opt = n.options[o];
                           c = c || (opt.selected != opt.defaultSelected);
                           if (opt.defaultSelected) def = o;
                       }
                       if (c && !n.multiple) c = (def != n.selectedIndex);
                       break;

                       // input / textarea
                      case "textarea":
                      case "input":

                       switch (n.type.toLowerCase()) {
                           case "checkbox":
                           case "radio":
                               // checkbox / radio
                               c = (n.checked != n.defaultChecked);
                               break;
                           default:
                               // standard values
                               c = (n.value != n.defaultValue);
                               break;
                       }

                       break;
                   }

                       if (c) changed.push(n);

           }

           return changed;

       }


       var form = document.getElementById("myform");
       var formSubmit =  false;

       //function to update changed value to "no" to avoid database updates if there are no changes on form
       form.onsubmit = function()
       {
       	  formSubmit = true;

           if(FormChanges(form).length == 0)
             {

               document.getElementById("changed").value = "no";

             }

             return true;
       }

   	window.onload = function()
   	{
         window.addEventListener("beforeunload", function (e) {

         	 var changed = FormChanges("myform");
           //if statement to allow form to submit without warning flag popping up
             if(formSubmit) {

                 return undefined;
             }

            //if statement to check if there have been form changes and to display warning flag
             if(changed.length != 0)
             {
                 var confirmationMessage = 'It looks like you have been editing something. '
                 + 'If you leave before saving, your changes will be lost.';

                 e.preventDefault();

                 (e || window.event).returnValue = confirmationMessage;
             }

         });

   	};
