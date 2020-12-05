$(document) .ready(function() {
  var $first_name = $('#first_name'),
      $first_name_err = $('#first_name_err'),
      $last_name = $('#last_name'),
      $last_name_err = $('#last_name_err'),
      $email = $('#email'),
      $email_err = $('#email_err');

      $('.err_span') .hide();
      $('.required_field') .addClass('text-danger');

      $first_name .on('blur', function() {
        if ($first_name.val() == '') {
          $first_name_err .slideDown();
        }
      }) .on('focus', function() {
        $first_name_err .slideUp();
      });
      
      $last_name .on('blur', function() {
        if ($last_name.val() == '') {
          $last_name_err .slideDown();
        }
      }) .on('focus', function() {
        $last_name_err .slideUp();
      });

      $email .on('blur', function() {
        if ($email.val() == '') {
          $email_err .slideDown();
        }
      }) .on('focus', function() {
        $email_err .slideUp();
      });
});
