<?php
$connection = ssh2_connection("turing.slu.edu",22);
if (ssh2_auth_password($connection, "sshusername", "password")){
  echo "Authentication Successful!\m";
}
else{
  die("Authentication Failed...");
}
$stream = ssh2_exec($connection, 'mysql -ucsp_homework -pP7a4H^3zHomework;use csp_homework;');
//$servername = "turing.slu.edu";
//$username = "csp_homework";
//$password = "P7a4H^3zHomework";
//$dbname = "csp_homework";	
	
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
