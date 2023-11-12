
<?php
$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "cms_project";

// Connect to the MySQL server
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>