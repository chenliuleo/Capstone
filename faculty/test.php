<?php
 session_start();
 include ('conn.php');
 $username = $_SESSION['username'];
 $user_query = mysql_query("select id from users where username='$username' limit 1");
 //while ($arow = mysql_fetch_array($user_query)) {
 //  var_dump($arow);
 //}
 //echo "<br>";
 $row = mysql_fetch_row($user_query);
 var_dump($row);
 echo "<br>";
 $id = $row[0];
 var_dump($id);
 echo "<br>";
 $query = mysql_query("select course_id from courses_faculty where faculty_id='$id'");
 //var_dump($query);
 $newarray = array();
 while ($arow = mysql_fetch_row($query)) {
   var_dump($arow);
   array_push($newarray, $arow[0]);
   var_dump($newarray);
   echo "XXX<br>";
 }
  echo "<br>";
 //$array = Array();
 //echo sizeof($query);
 $course_id = mysql_fetch_array($query);
 var_dump($course_id);
 //foreach($course_id as $aaa)
 //{
 //  $array = $aaa['course_id'];
 //}
 //echo sizeof($course_id['course_id']);
 /*for($i=0;$i<sizeof($course_id);$i++)
 {
   echo $course_id['course_id'];
 }
 //echo $array[0] . "<br>";
 //echo $array[1] . "<br>";*/
 foreach($newarray as $cid)
 {
  $course_detail = mysql_query("select id,name,section,semester,course_year from courses where id='$cid'");
  $cdetail = mysql_fetch_array($course_detail);
  $var = $cdetail['id'];
  $temp = $cdetail['name'] . "." . $cdetail['section'] . " " . $cdetail['semester'] . $cdetail['course_year'];
  echo "<li><center><a href=\"facultyCourse.php?id=$var\" target=\"main\">$temp</a><center></li>";
  }
  echo "</ul>";
 ?>