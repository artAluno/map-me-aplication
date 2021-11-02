<?php
    $mysqli = new mysqli("mysql-mycloudweb.alwaysdata.net", "239074_grupo", "@0987654321bd", "mycloudweb_mapme");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
