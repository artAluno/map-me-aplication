<?php
    $mysqli = new mysqli("sql10.freesqldatabase.com", "sql10448585", "QXQDRT7Rmg", "sql10448585");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
