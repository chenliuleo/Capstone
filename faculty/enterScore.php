<html>
<head>
</head>
<body>
<?php
session_start();
include('conn.php');
$course_id = $_GET['id'];
$banner_id = $_GET['banner'];
$homework_id = $_GET['hwid'];
$student_id = $_GET['stdid'];
$earned_score = $_GET['score'];
$sql = mysql_query("update homework_students set earned_points='$earned_score' where student_id='$student_id' and homework_id='$homework_id'");
echo "<script>window.location.href=\"studentGrade.php?id=$course_id&banner=$banner_id\"</script>";
?>
</body>
</html>