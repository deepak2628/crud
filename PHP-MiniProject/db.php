<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

/* Table name : contacts(name, contact, email, gender, city, hobbies, image) */

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
