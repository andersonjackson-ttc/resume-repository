/*
  author: Khalid Smalls
  program: TTC resume repository
  purpose: displays message if required field is left empty on blur
*/

$(document) .ready(function() {
  var $old_password = $('#old_password'),
      $err_old_password = $('#err_old_password'),
      $password1 = $('#password1'),
      $err_password1 = $('#err_password1'),
      $password2 = $('#password2'),
      $err_password2 = $('#err_password2');

      $('.err_msg') .hide();

      //error messages slide down/up on blur/focus
      //if the field is left empty
      $old_password .on('blur', function() {
        if ($old_password.val() == '') {
          $err_old_password .slideDown();
        }
      }) .on('focus', function() {
        $err_old_password .slideUp();
      });

      $password1 .on('blur', function() {
        if ($password1.val() == '') {
          $err_password1 .slideDown();
        }
      }) .on('focus', function() {
        $err_password1 .slideUp();
      });

      $password2 .on('blur', function() {
        $err_password2 .slideDown();
      }) .on('focus', function() {
        $err_password2 .slideUp();
      });

      $reset_email .on('blur', function() {
        $err_reset_email .slideDown();
      }) .on('focus', function() {
        $err_reset_email .slideUp();
      });
});
