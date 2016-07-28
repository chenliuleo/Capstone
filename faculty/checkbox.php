<?php
session_start();
$name=$_GET['newCourse'];
//echo $name;
foreach($name as $newCourse){
  echo $newCourse ."<br />";
}
include ('conn.php');
$username = $_SESSION['username'];
echo $username;
$user_query = mysql_query("select id from users where username='$username' limit 1");
$row = mysql_fetch_array($user_query);
//for ($i=0;$i<sizeof($row);$i++)
//{
//  echo $row[$i] . "<br>";
//  }
$id = $row['id'];
//echo $id;

foreach($name as $temp){
  echo $temp;
  $courses_faculty = mysql_query("insert into courses_faculty (course_id, faculty_id) values ('$temp', '$id')");
  }
  
?>