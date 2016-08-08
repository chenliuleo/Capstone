<?php
session_start();
$name=$_GET['deleteStudent'];
include ('conn.php');
$username = $_SESSION['username'];
$course_id = $_GET['cid'];
var_dump($name);
echo "<br>";
var_dump($course_id);
//echo $username;
//echo $id;
foreach($name as $temp){
//  echo $temp;
  $courses_faculty = mysql_query("delete from course_students where student_id='$temp' and course_id='$course_id'");
  }
echo "<meta http-equiv='refresh' content='0; deleteStudent.php?id=$course_id' />";
//$message="Add course succes!";
//echo "<script type='text/javscript'>alert('$message');</script>";  
?>
