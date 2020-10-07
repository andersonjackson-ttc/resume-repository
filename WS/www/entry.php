	<?php
    include_once '../src/test.php';

    $first = $_POST['first'];

    $sql = "INSERT INTO test (fname) VALUES ('$first');";

    mysqli_query($con, $sql);