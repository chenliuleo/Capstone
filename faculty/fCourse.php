 <html>
 <head>
 </head>
 <body>
 <?php
 session_start();
 echo "<a href =\"facultyHome.html\" target =\"main\">Home</a><br>";
 include ('conn.php');
 $username = $_SESSION['username'];
 $user_query = mysql_query("select id from users where username='$username' limit 1");
 $row = mysql_fetch_array($user_query);
 $id = $row['id'];
 $query = mysql_query("select course_id from courses_faculty where faculty_id='$id'");
 $course_id = mysql_fetch_array($query);
 foreach($course_id as $cid)
 {
  $course_detail = mysql_query("select id,name,section,semester,course_year from courses where id='$cid'");
  $cdetail = mysql_fetch_array($course_detail);
  $var = $cdetail['id'];
  $temp = $cdetail['name'] . "." . $cdetail['section'] . " " . $cdetail['semester'] . $cdetail['course_year'];
  echo "<a href=\"facultyCourse.php?id=$var\" target=\"main\">$temp</a><br>";
  }
 ?>
 </body>
 </html>
