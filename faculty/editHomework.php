 
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
//echo $deadline;
$date = date("Y-m-d\TH:i:s",strtotime($deadline));
//echo $date;

echo "<form action='editHomework2.php?hwid=$homework_id&uid=$uid&id=$course_id' method='post' name='editHomework'>";
echo "<p>Title: ";
echo "<br>";
echo "<input id='title' type='text' name='title' value='$title'>";
echo "<br><br>";
echo "Description: ";
echo "<br>";
echo "<input id='description' type='text' name='description' value='$description'>";
echo "<br><br>";
echo "Deadline: ";
echo "<br>";
echo "<input id='deadline' type='datetime-local' name='deadline' value='$date'>";
echo "<br><br>";
echo "Total points: ";
echo "<br>";
echo "<input id='total_points' type='number' name='total_points' value='$total_points'>";
echo "<br>";
echo "<button onclick='submit()'>Update</button>";
echo "</p></form>";
?>
</body>
</html>
