<?php
session_start();
include('conn.php');
$name = $_POST['name'];
$section = $_POST['section'];
$description = $_POST['description'];
$course_year = $_POST['course_year'];
$semester = $_POST['semester'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$sql = mysql_query("insert into courses(name,section,description,course_year,semester,start_date,end_date) value('$name','$section','$description','$course_year','$semester','$start_date','$end_date')");
echo "Course added!<br>";
?>
