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

$homework_id = $_GET['hwid'];
$course_id = $_GET['id'];
$username = $_SESSION['username'];
$user_info = mysql_query("select * from users where username='$username'");
$user_info_ = mysql_fetch_array($user_info);
$uid = $user_info_['id'];

$homework_sql = mysql_query("select * from homework where id='$homework_id'");
$homework_array = mysql_fetch_array($homework_sql);
$total_points = $homework_array['total_points'];
$title = $homework_array['title'];
$description = $homework_array['description'];
$deadline = $homework_array['deadline'];
$student_sql = mysql_query("select student_id from homework_students where homework_id='$homework_id'");
$student_list = Array();
while ($student_array = mysql_fetch_row($student_sql)){
  array_push($student_list,$student_array[0]);
}
echo "Homework Title: " . $title;
echo "<br>";
echo "Description: " . $description;
echo "<br>";
echo "Deadline: " . $deadline;
echo "<br>";
echo "<a href=\"manageFiles.php?hwid=$homework_id&uid=$uid&id=$course_id\">Attachment</a>";
echo "<br>";
echo "<hr>";
echo "<table border='1'>
      <tr>
      <td>Banner ID</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Earned Points</td>
      <td>Full Points</td>
      <td>Score, Feedback and Download</td>
      </tr>";
foreach($student_list as $slist){
  $mysql = mysql_query("select * from users where id='$slist'");
  $mysql2 = mysql_fetch_array($mysql);
  $banner_id = $mysql2['banner_id'];
  $first_name = $mysql2['first_name'];
  $last_name = $mysql2['last_name'];
  $mysql3 = mysql_query("select earned_points from homework_students where homework_id='$homework_id' and student_id='$slist'");
  $mysql4 = mysql_fetch_array($mysql3);
  $earned_points = $mysql4['earned_points'];
  echo "<tr>";
  echo "<td>" . $banner_id . "</td>";
  echo "<td>" . $first_name . "</td>";
  echo "<td>" . $last_name . "</td>";
  echo "<td>" . $earned_points . "</td>";
  echo "<td>" . $total_points . "</td>";
  echo "<td><a href=\"studentHomework.php?id=$course_id&banner=$banner_id&stdid=$slist&hwid=$homework_id\">Edit</a></td>";
  echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
