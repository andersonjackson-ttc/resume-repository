$(document) .ready(function() {
  var $footer_btns = $('#footer_btns'),
      url = $(location).attr('href'),
      url_split = url.split("/"),
      page = url_split[url_split.length -1];

  $footer_btns .hide();
  if (page == 'student_form.php') {
    $footer_btns.fadeIn('slow');
  } else {
    $footer_btns.hide();
  }

});
