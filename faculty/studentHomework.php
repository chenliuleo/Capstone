<html>
<head>

</head>
<body>
<?php
session_start();
include ('conn.php');

$course_id = $_GET['id'];
$banner_id = $_GET['banner'];
$homework_id = $_GET['hwid'];
$student_id = $_GET['stdid'];

$homework_query = mysql_query("select * from homework where id='$homework_id'");
$homework = mysql_fetch_array($homework_query);
$student_homework_query = mysql_query("select * from homework_students where homework_id='$homework_id' and student_id='$student_id'");
$student_homework = mysql_fetch_array($student_homework_query);
$student_info_query = mysql_query("select * from users where id='$student_id'");
$student_info = mysql_fetch_array($student_info_query);

echo "Homework: " . $homework['title'] . "<br>";
echo "Description: " . $homework['description'] . "<br>";
echo "Student Name: " . $student_info['first_name'] . " " . $student_info['last_name'] . "<br>";
echo "Full Score: " . $homework['total_points'] . "<br>";
echo "<br>";
echo "<hr>";
echo "<form action=\"enterScore.php?id=$course_id&banner=$banner_id&hwid=$homework_id&stdid=$student_id\">";
echo "Enter Score: " . "<input id='earned_points' type='int' name='earned_points' /><br>";
echo "Enter Feedback: " . "<input id='feedback' type='text' name='feedback' /><br>";
echo "<input type='hidden' name='id' value='$course_id' />";
echo "<input type='hidden' name='banner' value='$banner_id' />";
echo "<input type='hidden' name='hwid' value='$homework_id' />";
echo "<input type='hidden' name='stdid' value='$student_id' />";
echo "<input type='submit' value='Submit' />";
echo "</form>";

?>
</body>
</html>