<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "final project bdl";

$koneksi = mysqli_connect($host, $user, $pass);

if ($koneksi) {
    $buka = mysqli_select_db($koneksi,$database);

    if ($buka) {
        echo "";
    } else {
        echo "Database not found";
    }
} else {
    echo "MySQL is not connected";
}

?>