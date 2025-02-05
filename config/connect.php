<?php
    $severname = "localhost:3806";
    $username = "root";
    $password = "";
    $database = "coffees";

    $kn = new mysqli($severname, $username, $password, $database);
    if (mysqli_connect_errno()) {
        echo "loi ket noi" . mysqli_connect_error();
        exit();
    }
?>