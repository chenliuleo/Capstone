<html>
  <head>
    <title>Student Information</title>

  </head>
  <body>
  <?php
  session_start();
  include ('conn.php');
  $course_id = $_GET['id'];
  echo "<a href=\"facultyCourse.php?id=$course_id\" style=\"color:#003DA5\">back</a>";
  //echo $course_id;
  //在此处插入下拉式菜单并输出bannerid;
  $input_total_points = mysql_query("insert into homework_students(total_points) select total_points from homework");
  $laostudent = mysql_query("select student_id from course_students where course_id='$course_id'");
  //var_dump($laostudent);
  $array1 = Array();
  while ($temp_stu = mysql_fetch_row($laostudent)){
    //var_dump($temp_stu[0]);
    array_push($array1, $temp_stu[0]);
  }
  //var_dump($array1);
  echo "<select>
	<option value=\"\">Please select a student</option>";
  foreach($array1 as $sid)
 {
  $student_list = mysql_query("select * from users where id='$sid'");
  $sdetail = mysql_fetch_array($student_list);
  $bannerid = $sdetail['banner_id'];
  $fname = $sdetail['first_name'];
  $lname = $sdetail['last_name'];
  $temp = $fname . " " . $lname . "(" . $bannerid . ")";
  echo "<option value=\"$bannerid\">$temp</option>";
  }
  echo "</select>";
  $mysql_query = mysql_query("select * from homework_student where student_id='$student_id'");
  /* <h4>Term: </h4>
   <h4>Course Number: </h4>
   <h4>Course Name: </h4>
   <h4>Section: </h4>
   <h4>Student Name: </h4>
   <h4>Banner ID: </h4>
   <hr>
   <h4>Student Name:</h4>
   <dl>
     <ul>
     <p>
       <table border="1" cellpadding="6" cellspacing="2">
         <thead>
           <dd><tr>
               <th width = "100"><b>Homework</b></th>
	       <th width = "100"><b>DeadLine</b></th>
	       <th width = "100"><b>Submit Time</b></th>
	       <th width = "150"><b>Student Score</b></th>
	       <th width = "100"><b>Full Score</b></th>
	       <th width = "100"><b>Note</b></th>
	       <th width = "100"><b>Feedback</b></th>
	   </tr></dd>
	   </table>
     </p>
     </ul>
   </dl>*/
  ?>
  </body>
   
</html>
