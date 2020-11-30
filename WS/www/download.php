<?php
 //include_once '../src/connection.php';

if (isset($_GET['file_id'])) {
    $file = $_GET['file_id'];

if (file_exists('../uploads/' . $file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
	
}
}



?>