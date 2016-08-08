<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      div,table,p,a {
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
    include ('conn.php');
    //echo $_GET['id'];
    $course_id = $_GET['id'];
    $username = $_SESSION['username'];
    $user_info = mysql_query("select * from users where username='$username'");
    $user_info_ = mysql_fetch_array($user_info);
    $uid = $user_info_['id'];
    //echo $course_id;
    $mysql_query = mysql_query("select * from courses where id='$course_id'");
    $course = mysql_fetch_array($mysql_query);
    echo "<div style='text-align:left;'><font color='#003DA5'>Term: ";
    echo $course['semester'];
    echo " ";
    //echo "<\div>";
    echo $course['course_year'];
    echo "<br>";
    echo "Course Number: ";
    echo $course['name'];
    echo "<br>";
    echo "Section: ";
    echo $course['section'];
    echo "<br>";
    echo "Course Name: ";
    echo $course['description'];
    echo "</div>";
    echo "<br>";
    echo "<hr></font>";
    echo "<p>Homework:</p>";
    echo "<p>Student List: </p>";
    echo "<table border='1'>
    <tr>
    <th>Banner ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Earned Score</th>
    <th>Full Score</th>
    <th>Details</th>
    <th>Select</th>
    </tr>";
    $mysql_query3 = mysql_query("select student_id from course_students where course_id='$course_id'");
    $newarray = Array();
    while ($aaa = mysql_fetch_row($mysql_query3)){
      array_push($newarray, $aaa[0]);
    }
    echo "<form method=\"get\" action=\"deleteScript.php?cid=$course_id\">";
    foreach ($newarray as $list){
      $mysql_query4 = mysql_query("select * from users where id='$list'");
      $student = mysql_fetch_array($mysql_query4);
      $student_id = $student['id'];
      $mysql_query5 = mysql_query("select total_points from homework where course_id='$course_id'");
      $total_sum = Array();
      while ($total_points = mysql_fetch_row($mysql_query5)){
	array_push($total_sum, (int)$total_points[0]);
      }
      $mysql_query7 = mysql_query("select id from homework where course_id='$course_id'");
      $all_homework_id = Array();
      while ($all_id = mysql_fetch_row($mysql_query7)){
	array_push($all_homework_id, $all_id[0]);
      }
      $total_earned_points = Array();
      foreach ($all_homework_id as $homework_id){
	$mysql_query6 = mysql_query("select earned_points from homework_students where homework_id='$homework_id' and student_id='$student_id'");
	$earned_points_temp = mysql_fetch_array($mysql_query6);
	$earned_points = $earned_points_temp['earned_points'];
	array_push($total_earned_points, (int)$earned_points);
      }
      echo "<tr>";
      echo "<td>" . $student['banner_id'] . "</td>";
      echo "<td>" . $student['first_name'] . "</td>";
      echo "<td>" . $student['last_name'] . "</td>";
      echo "<td>" . array_sum($total_earned_points) . "</td>";
      echo "<td>" . array_sum($total_sum) . "</td>";
      echo "<td><a href=\"studentGrade.php?id=$course_id&banner=$student[banner_id]\">Click here</a></td>";
      echo "<td><input type=\"CHECKBOX\" name=\"deleteStudent[]\" id=\"deleteStudent\" value=\"$student_id\"></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<input type=\"submit\" name=\"submit\" value=\"Delete\">";
    echo "</form>"; 
    echo "<br>";
  ?>
   <br>
   </body>
</html>