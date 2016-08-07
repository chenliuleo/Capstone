<?php
session_start();
include ('conn.php');

$course_id = $_GET['id'];
$homework_id = $_GET['hwid'];
$uid = $_GET['uid'];
$file_id = $_GET['fid'];

$delete = mysql_query("delete from files where id='$file_id'");
echo "<script>window.location.href=\"manageFiles.php?id=$course_id&hwid=$homework_id&uid=$uid\"</script>";
?>