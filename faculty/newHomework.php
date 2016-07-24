<html>
<head>
<?php
$number = $_POST['number'];
$title = $_POST['title'];
$deadline = $_POST['deadline'];
$point = $_POST['point'];
$score = $_POST['score'];
echo "number: ",$number;
echo " title: ",$title;
echo " deadline: ",$deadline;
echo " point: ",$point;
echo " score: ",$score;
echo " success!";
include ('conn.php');
$sql = "INSERT INTO homework(deadline) values('$deadline')";
?>
</head>
</html>
