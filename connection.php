<?php
    $mysqli = new mysqli("sql10.freesqldatabase.com", "sql10452085", "kMpLSI4XEA", "sql10452085");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
