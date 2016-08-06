
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
  </head>
  <body>
<?php
session_start();
include ('conn.php');
$course_id = $_GET['id'];
$mysql_query = mysql_query("select * from courses where id='$course_id'");
$course_info = mysql_fetch_array($mysql_query);
echo "Term: " . $course_info['semester'] . " " . $course_info['course_year'];
echo "<br>";
echo "Course Name: " . $course_info['name'];
echo "<br>";
echo "Section: " . $course_info['section'];
echo "<br>";
echo "Description: " . $course_info['description'];
echo "<br>";
echo "<hr>";
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
