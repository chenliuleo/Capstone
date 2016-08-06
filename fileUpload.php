<html>
<head>
</head>
<body>
<?php
session_start();
include('conn.php');
$homework_id = $_GET['hwid'];
$user_id = $_GET['uid'];
$filename = $_GET['filename'];
echo $filename;
//$sql = mysql_query("update homework_students set earned_points='$earned_score' where student_id='$student_id' and homework_id='$homework_id'");
//$sql2 = mysql_query("update homework_students set feedback='$feedback' where student_id='$student_id' and homework_id='$homework_id'");
//echo "<script>window.location.href=\"studentGrade.php?id=$course_id&banner=$banner_id\"</script>";
?>
</body>
</html>