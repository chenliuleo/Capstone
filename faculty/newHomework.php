<html>
<head>
<?php
session_start();
$description=$_POST['description'];
$title = $_POST['title'];
$deadline = $_POST['deadline'];
$point = $_POST['point'];
$date=date("Y-m-d H:i:s",strtotime($deadline));

/*echo " title: ",$title;
echo " deadline: ",$deadline;
echo "date: ",$date;
echo " point: ",$point;
echo " score: ",$score;
echo " success!";
echo $description*/;

$course_id = $_GET['id'];
//echo $course_id;
include ('conn.php');
$sql = mysql_query("insert into homework(title,description,course_id,deadline,active,total_points) values('$title','$description','$course_id','$date','1','$point')");
$sql2 = mysql_query("select student_id from course_students where course_id='$course_id'");
$newarray = Array();
while ($aaa = mysql_fetch_row($sql2)){
  array_push($newarray, $aaa[0]);
}
$sql3 = mysql_query("select id from homework where title='$title' and description='$description' and deadline='$date'");
$array = mysql_fetch_array($sql3);
$homework_id = $array['id'];
foreach ($newarray as $bbb){
  $sql_student = mysql_query("insert into homework_students(homework_id,student_id) values('$homework_id','$bbb')");
}
$message="success";
echo "<script>
alert('$message');
window.locat ion.href='facultyCourse.php?id=$course_id';
</script>";
?>
</head>
</html>
