<?php
// config.php
$servername = "localhost"; // Replace with your server details
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "athena_fashion_store"; // Replace with your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
