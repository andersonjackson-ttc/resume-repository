<?php
  include('generate_radio_group.php');

  $btn_array = array('yes'=>'Yes', 'no'=>'No', 'maybe'=>'Maybe');

  echo generate_radio_btns('decision', $btn_array, 'no'); 


  ?>
