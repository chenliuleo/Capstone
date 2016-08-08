<?php
session_start();
include('conn.php');
$name = $_GET['newCourse'];
foreach ($name as $temp){
    $mysql_query = mysql_query("delete  from courses where id='$temp'");
}

?>