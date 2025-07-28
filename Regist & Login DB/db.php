<?php
$host = "localhost"; // Local server la nadakkura nala localhost
$user = "root"; // Default username for XAMPP
$pass = ""; // Password illama vechirupom mostly
$db = "mybase"; // Neenga vechiruka DB name

$conn = mysqli_connect($host, $user, $pass, $db);

// Connection check
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 ?>
