<?php
  include_once '../src/connection.php';
  include '../www/student_edit_dummy.html';

$studentName = "Micheal";
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$descBox = $doc->getElementById('studentName');
$appended = $doc->createElement('p', $studentName);
$descBox->appendChild($appended);
echo $doc->saveHTML();
 ?>
