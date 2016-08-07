<html>
<head>
</head>
<body>
<?php
session_start();
include('conn.php');
$homework_id = $_GET['hwid'];
$student_id = $_GET['uid'];
$cid = $_GET['cid'];
$sql = mysql_query("select feedback from homework_students where homework_id='$homework_id' and student_id='$student_id'");
$array = mysql_fetch_array($sql);
echo "Feedback:";
echo "<br>";
if($array['feedback'] == ""){
  echo "There is no feedback at this time.";
}
echo $array['feedback'];
echo "<br></p><a href=\"sCourse.php?id=$cid\">Back</a>";
?>
</body>
</html>