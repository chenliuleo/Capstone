
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style type="text/css">
      p,table,h1 {
      font-family: Arial, Helvetica, sans-serif;
      }
      table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      }
      th, td {
    padding: 5px;
}
    </style>
  </head>
<body>
<?php
session_start();
include('conn.php');
$username = $_SESSION['username'];
echo "<h1>Welcome!</h1>";
echo "<hr>";
echo "<p>Coming due:";
$current_server_time = date("Y-m-d") . date("h:i:sa");
$mysql_date = date("Y-m-d H:i:s", strtotime($current_server_time));
$mysql_query2 = mysql_query("select * from users where username='$username' limit 1");
$student_info = mysql_fetch_array($mysql_query2);
$student_id = $student_info['id'];
$mysql_query = mysql_query("select homework_id from homework_students where student_id='$student_id'");
$homework_array = Array();
while ($row = mysql_fetch_row($mysql_query)){
  array_push($homework_array,$row[0]);
}
$coming_due = Array();
//var_dump($homework_array);
foreach ($homework_array as $hwid){
  $deadline_sql = mysql_query("select deadline from homework where id='$hwid'");
  $deadline_array = mysql_fetch_array($deadline_sql);
  $deadline = $deadline_array['deadline'];
  if($mysql_date < $deadline){
    array_push($coming_due,$hwid);
  }
}
echo "<br>";
echo "<table border='1'>
     <tr>
     <th>Course Number</th>
     <th>Course Name</th>
     <th>Homework</th>
     <th>Description</th>
     <th>Deadline</th>
     </tr>";
//var_dump($coming_due);
foreach ($coming_due as $due){
  $homework_sql = mysql_query("select * from homework where id='$due'");
  $homework_ = mysql_fetch_array($homework_sql);
  $due_course = $homework_['course_id'];
  $due_course_sql = mysql_query("select * from courses where id='$due_course'");
  $due_course_ = mysql_fetch_array($due_course_sql);
  $course_number = $due_course_['name'] . "." . $due_course_['section'];
  $course_name = $due_course_['description'];
  $homework_title = $homework_['title'];
  $description = $homework_['description'];
  $deadline_time = $homework_['deadline'];
  echo "<tr>";
  echo "<td>" . $course_number . "</td>";
  echo "<td>" . $course_name . "</td>";
  echo "<td>" . $homework_title . "</td>";
  echo "<td>" . $description . "</td>";
  echo "<td>" . $deadline_time . "</td>";
  echo "</tr>";
}
echo "</table></p>";
?>
</body>
</html>
