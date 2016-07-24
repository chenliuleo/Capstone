<html>
<head>
<?php
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
include ('conn.php');
$sql = "INSERT INTO homework(deadline) values('$deadline')";
?>
</head>
</html>
