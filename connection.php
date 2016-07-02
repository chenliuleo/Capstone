<?php
$servername = "turing.slu.edu";
$username = "csp_homework";
$password = "P7a4H^3zHomework";
$dbname = "csp_homework";	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (banner_id, username, first_name, last_name, usertype, password)
VALUES (Banner ID, text, First name, Last name, User type, password)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>