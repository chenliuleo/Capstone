<?php
session_start();
include('conn.php');
$homework_id = $_GET['hwid'];
$course_id = $_GET['id'];
$username = $_SESSION['username'];
$user_info = mysql_query("select * from users where username='$username'");
$user_info_ = mysql_fetch_array($user_info);
$uid = $user_info_['id'];

$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$date=date("Y-m-d H:i:s",strtotime($deadline));
$total_points = $_POST['total_points'];
$sql = mysql_query("update homework set title='$title' where id='$homework_id'");
$sql2 = mysql_query("update homework set description='$description' where id='$homework_id'");
$sql3 = mysql_query("update homework set deadline='$date' where id='$homework_id'");
$sql4 = mysql_query("update homework set total_points='$total_points' where id='$homework_id'");
echo "<script>window.location.href=\"facultyCourse.php?id=$course_id\"</script>";
?>