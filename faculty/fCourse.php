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
   font-family: Arial, Helvetica, sans-serif;
   display: block;
   color: #003DA5;
   padding: 8px 16px;
   text-decoration: none;
   }
   
   /* Change the link color on hover */
   li a:hover {
   background-color: #003DA5;
   color: white;
   }
 </style>
 </head>
 <body style="background-color:#e6e6e6;">
 <?php
 session_start();
 echo "<ul>";
 echo "<li><center><a href =\"facultyHome.php\" target =\"main\">Home</a><center></li>";
 $username = $_SESSION['username'];
 include ('conn.php');
 $user_query = mysql_query("select id from users where username='$username' limit 1");

 $row = mysql_fetch_row($user_query);
 $id = $row[0];
 $query = mysql_query("select course_id from courses_faculty where faculty_id='$id'");

 $newarray = array();
 while ($arow = mysql_fetch_row($query)) {
   array_push($newarray, $arow[0]);
 }

 foreach($newarray as $cid)
 {
  $course_detail = mysql_query("select id,name,section,semester,course_year from courses where id='$cid'");
  $cdetail = mysql_fetch_array($course_detail);
  $var = $cdetail['id'];
  $temp = $cdetail['name'] . "." . $cdetail['section'] . "<br>" . $cdetail['semester'] . " " . $cdetail['course_year'];
  echo "<li><center><a href=\"facultyCourse.php?id=$var\" target=\"main\">$temp</a><center></li>";
  }
  echo "</ul>";
 ?>
 </body>
 </html>
