<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "cs";

// Create connection
$conn = new PDO( 'mysql:host=' .$servername. ';dbname=' .$dbname, $username, $password );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}