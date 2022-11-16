<?php

    $host = "localhost";
    $db = "oglasna_tab";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password, $db);

    if($conn->connect_errno){
        exit("Konekcija nije uspela: greška> ".$conn->connect_error.", err kod>".$conn->connect_errno);
    }

?>