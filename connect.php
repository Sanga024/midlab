<?php
$servername = "localhost";
$username   = "root";
$passwordDB = "";      
$database   = "cuser";

$conn = mysqli_connect($servername, $username, $passwordDB, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
