 <html>
 <head>
 <meta http-equiv="refresh" content="30">
 <style type="text/css">
   
   ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   width: 200px;
  
   }
   
   li a {
   display: block;
   color: blue;
   padding: 8px 16px;
   text-decoration: none;
   }
   
   /* Change the link color on hover */
   li a:hover {
   background-color: #555;
   color: white;
   }
 </style>
 </head>
 <body>
 <?php
 session_start();
 echo "<ul>";
 echo "<li><center><a href =\"facultyHome.html\" target =\"main\">Home</a><center></li>";
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
  echo "<li><center><a href=\"facultyCourse.php?id=$var\" target=\"main\">$temp</a><center></li>";
  }
  echo "</ul>";
 ?>
 </body>
 </html>
