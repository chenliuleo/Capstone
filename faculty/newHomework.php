<html>
<head>
<?php
session_start();
$description=$_POST['description'];
$title = $_POST['title'];
$deadline = $_POST['deadline'];
$point = $_POST['point'];
$date=date("Y-m-d H:i:s",strtotime($deadline));

echo " title: ",$title;
echo " deadline: ",$deadline;
echo "date: ",$date;
echo " point: ",$point;
echo " score: ",$score;
echo " success!";
echo $description;
$course_id = $_GET['id'];
echo $course_id;
include ('conn.php');
$sql = mysql_query("insert into homework(title,description,course_id,deadline,active) values('$title','$description','$course_id','$date','1')");
?>
</head>
</html>
