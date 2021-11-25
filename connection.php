<?php
    $mysqli = new mysqli("remotemysql.com", "LcytHOt4Cg", "ictZxbgx4b", "LcytHOt4Cg");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
