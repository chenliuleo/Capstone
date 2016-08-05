<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      div,table,p,a {
      font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
  <?php
    //echo $_GET['id'];
    $course_id = $_GET['id'];
    //echo $course_id;
    include ('conn.php');
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
    $mysql_query2 = mysql_query("select * from homework where course_id='$course_id'");
    echo "<table border='1'>
    <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Deadline</th>
    <th>Points</th>
    <th>Attached files</th>
    </tr>";
    while ($homework = mysql_fetch_array($mysql_query2))
    {
      echo "<tr>";
      echo "<td>" . $homework['title'] . "</td>";
      echo "<td>" . $homework['description'] . "</td>";
      echo "<td>" . $homework['deadline'] . "</td>";
      echo "<td>" . $homework['total_points'] . "</td>";
      echo "<td>" . $homework['attached_files'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<hr>";
    //echo "<hr>";
    echo "<p>Student List: </p>";
    echo "<table border='1'>
    <tr>
    <th>Banner ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Earned Score</th>
    <th>Full Score</th>
    <th>Details</th>
    </tr>";
    $mysql_query3 = mysql_query("select student_id from course_students where course_id='$course_id'");
    $newarray = Array();
    while ($aaa = mysql_fetch_row($mysql_query3)){
      array_push($newarray, $aaa[0]);
    }
    foreach ($newarray as $list){
      $mysql_query4 = mysql_query("select * from users where id='$list'");
      $student = mysql_fetch_array($mysql_query4);
      $student_id = $student['id'];
      $mysql_query5 = mysql_query("select total_points from homework where course_id='$course_id'");
      $total_points = mysql_fetch_array($mysql_query5);
      $mysql_query6 = mysql_query("select earned_points from homework_students where course_id='$course_id' and student_id='$student_id'");
      $earned_points = mysql_fetch_array($mysql_query6);
      echo "<tr>";
      echo "<td>" . $student['banner_id'] . "</td>";
      echo "<td>" . $student['first_name'] . "</td>";
      echo "<td>" . $student['last_name'] . "</td>";
      echo "<td>" . $earned_points['earned_points'] . "</td>";
      echo "<td>" . $total_points['total_points'] . "</td>";
      echo "<td> <a href=\"studentGrade.php?id=$course_id&banner=$student[banner_id]\">Click here </a></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<hr>";
  ?>
   
   <br>
   <?php 
   $course_id = $_GET['id'];
   //echo "<a href=\"studentGrade.php?id=$course_id\">Student grade</a>";
   echo "<a href=\"addHomework.php?id=$course_id\">Add homework</a>"; 
   ?>

   </body>
</html>
