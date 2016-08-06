<html>
<head>
<style>
  p{font-family: Arial, Helvetica, sans-serif;}
</style>
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

echo "<p>Homework: " . $homework['title'] . "<br>";
echo "Description: " . $homework['description'] . "<br>";
echo "Student Name: " . $student_info['first_name'] . " " . $student_info['last_name'] . "<br>";
echo "Full Score: " . $homework['total_points'] . "<br></p>";
echo "<hr>";
$get_file_sql = mysql_query("select id from files where user_id='$student_id' and hw_id='$homework_id' order by submit_time,filename");
$get_file_array = Array();
while($file_id = mysql_fetch_row($get_file_sql)){
  array_push($get_file_array,$file_id[0]);
}
foreach($get_file_array as $fid){
  $get_filename = mysql_query("select filename from files where id='$fid'");
  $filename_array = mysql_fetch_array($get_filename);
  $filename = $filename_array['filename'];
  echo "<p>File name: ";
  echo $filename;
  echo " ";
  echo "<a href=\"http://turing.slu.edu/~lchen22/cgi-bin/download.py?name=/export/mathcs/home/student/l/lchen22/WWW/upload/$filename\">Download</a>";
  echo "<br><p/>";
}
echo "<hr>";
echo "<form action=\"enterScore.php?id=$course_id&banner=$banner_id&hwid=$homework_id&stdid=$student_id\">";
echo "<p>Enter Score: " . "<input id='earned_points' type='int' name='earned_points' /><br><br>";
echo "Enter Feedback: " . "<br><textarea rows='4' cols='50' id='feedback' type='text' name='feedback'></textarea><br></p>";
echo "<input type='hidden' name='id' value='$course_id' />";
echo "<input type='hidden' name='banner' value='$banner_id' />";
echo "<input type='hidden' name='hwid' value='$homework_id' />";
echo "<input type='hidden' name='stdid' value='$student_id' />";
echo "<input type='submit' value='Submit' />";
echo "</form>";

?>
</body>
</html>
