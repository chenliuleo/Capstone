
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      table,p{
      font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
<?php
session_start();
include ('conn.php');
$username = $_SESSION['username'];
$course_id = $_GET['id'];
$mysql_query = mysql_query("select * from courses where id='$course_id'");
$course_info = mysql_fetch_array($mysql_query);
$mysql_query2 = mysql_query("select * from users where username='$username' limit 1");
$student_info = mysql_fetch_array($mysql_query2);
$student_id = $student_info['id'];
echo "<p>Term: " . $course_info['semester'] . " " . $course_info['course_year'];
echo "<br>";
echo "Course Name: " . $course_info['name'];
echo "<br>";
echo "Section: " . $course_info['section'];
echo "<br>";
echo "Description: " . $course_info['description'];
echo "<br></p>";
echo "<hr>";
$current_server_time = date("Y-m-d") . date("h:i:sa");
$mysql_date = date("Y-m-d H:i:s", strtotime($current_server_time));
echo "Overall Score:";
echo "<br>";
echo "<table border='1'>
      <tr>
      <th>Overall Earned Points</th>
      <th>Overall Full Points</th>
      <th>Percentage</th>
      </tr>";
$homework_sql = mysql_query("select id from homework where course_id='$course_id'");
$homework_array = Array();
while ($homework_push = mysql_fetch_row($homework_sql)){
  array_push($homework_array, $homework_push[0]);
}
foreach ($homework_array as $hwid2){
  $each_score = mysql_query("select earned_points from homework_students where homework_id='$hwid2' and student_id='$student_id'");
  $get_score = mysql_fetch_array($each_score);
  $get_score2 = $get_score['earned_points'];
  $total_earned += (int)$get_score2;
  $total_score = mysql_query("select total_points from homework where id='$hwid2'");
  $get_total = mysql_fetch_array($total_score);
  $get_total2 = $get_total['total_points'];
  $total += (int)$get_total2;
  $percentage = round((((float)$total_earned / (float)$total)*100),2);
  $percent = $percentage . "%";
}
echo "<tr>
      <td>$total_earned</td>
      <td>$total</td>
      <td>$percent</td>
      </tr>
      </table>";
echo "<hr>";
echo "Homework:";
echo "<br>";
echo "<table border='1'>
     <tr>
     <th>Homework</th>
     <th>Description</th>
     <th>Deadline</th>
     <th>Earned Points</th>
     <th>Full Points</th>
     <th>Attached Files</th>
     <th>Upload Files</th>
     <th>Feedback</th>
     </tr>";

//var_dump($homework_array);
foreach ($homework_array as $hwid){
  $homework_detail_query = mysql_query("select * from homework where id='$hwid'");
  $homework_detail = mysql_fetch_array($homework_detail_query);
  $earned_points_query = mysql_query("select earned_points from homework_students where homework_id='$hwid' and student_id='$student_id'");
  $earned_points_array = mysql_fetch_array($earned_points_query);
  $earned_points = $earned_points_array['earned_points'];
  $faculty_sql = mysql_query("select faculty_id from courses_faculty where course_id='$course_id'");
  $faculty_array = mysql_fetch_array($faculty_sql);
  $faculty_id = $faculty_array['faculty_id'];
  echo "<tr>";
  echo "<td>" . $homework_detail['title'] . "</td>";
  echo "<td>" . $homework_detail['description'] . "</td>";
  echo "<td>" . $homework_detail['deadline'] . "</td>";
  echo "<td>" . $earned_points . "</td>";
  echo "<td>" . $homework_detail['total_points'] . "</td>";
  echo "<td>" . "<a href=\"downloadAttachment.php?hwid=$hwid&fid=$faculty_id&cid=$course_id\">Click Here</a>" . "</td>";
  echo "<td>" . "<a href=\"../upload_file2.php?hwid=$hwid&uid=$student_id\">Upload</a>" . "</td>";
  echo "<td>" . "<a href=\"feedback.php?hwid=$hwid&uid=$student_id&cid=$course_id\">Feedback</a>" . "</td>";
}
echo "</table>";
//echo $mysql_date;
 /*<dl>
   <ul>
     <p>
       <table border="1" cellpadding="6" cellspacing="2">
         <thead>
           <dd><tr>
               <th width = "100"><b>Number </b></td>
<th width = "100"><b>Title</b></td>
<th width = "100"><b>Dealine</b></td>
<th width = "150"><b>Point value</b></td>
<th width = "100"><b>Score</b></td>
<th width = "100"><b>Solution</b></td>
</tr></dd>

<dd><tr>
    <th width = "100"><a href="./homework.html">hw01</a> </td>
</tr></dd>

<dd><tr>
     <th width = "100"><b> </b></td>
 <th width = "100"><b> </b></td>
 <th width = "100"><b>total </b></td>
 <th width = "150"><b>900 </b></td>
 <th width = "100"><b>1000 </b></td>
 <th width = "100"><b>90%</b></td>
</tr></dd>*/
?>
  </body>
</html>
