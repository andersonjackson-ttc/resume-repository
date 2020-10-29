
<?php
# $name = name of the radio group
# $btns = associative array of radio buttons
# $default = default button value, checked


function generate_radio_btns($group_name, $btns, $default='') {
    $group_name = htmlentities($group_name);
    $html = '';
    foreach($btns as $value => $label) {
      $value = htmlentities($value);
      $html .= '<input type="radio"';

      if ($value == $default) {
        $html .= ' checked="checked"';
      }
      $html .= ' name="' . $group_name . '" value="' . $value . '"/>' . $label;
    }

    return $html;
}

?>
