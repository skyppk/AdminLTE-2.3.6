<?php
    $hostname = "tangg123456.asuscomm.com:443";
    $database = "partyideas";
    $username = "partyideas_backend_api";
    $password = "api";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conn,"utf8");
?>