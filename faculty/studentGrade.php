<html>
  <head>
    <style>
      h4,table {font-family: Arial,Helvetica, sans-serif;}
      h4 {color:#003DA5;}
    </style>
    <title>Student Information</title>

  </head>
  <body>
  <?php
  session_start();
  include ('conn.php');
  $course_id = $_GET['id'];
  $banner_id = $_GET['banner'];
  echo "<a href=\"facultyCourse.php?id=$course_id\" style=\"color:#003DA5\">back</a><br>";
  $get_student_info = mysql_query("select * from users where banner_id='$banner_id'");
  $student_info = mysql_fetch_array($get_student_info);
  $mysql_query2 = mysql_query("select * from courses where id='$course_id'");
  $laochulaidecourse = mysql_fetch_array($mysql_query2);
  echo "<h4>Term: " . $laochulaidecourse['semester'] . " " . $laochulaidecourse['course_year'] . "</h4>";
  echo "<h4>Course number and section: " . $laochulaidecourse['name'] . "." . $laochulaidecourse['section'] . "</h4>";
  echo "<h4>Course name: " . $laochulaidecourse['description'] . "</h4>";
  echo "<h4>Student Name: " . $student_info['first_name'] . " " . $student_info['last_name'] . "</h4>";
  echo "<h4>Banner ID: " . $student_info['banner_id'] . "</h4>";
  $student_id = $student_info['id'];
  echo "<hr>";
  echo "<table border='1'>
    <tr>
    <th>Homework</th>
    <th>Deadline</th>
    <th>Earned Points</th>
    <th>Total Points</th>
    <th>Files</th>
    <th>Note</th>
    <th>Feedback</th>
    <th>Enter Score</th>
    </tr>";
    $mysql_query3 = mysql_query("select id from homework where course_id='$course_id'");
    $newarray = Array();
    while ($aaa = mysql_fetch_row($mysql_query3)){
      array_push($newarray, $aaa[0]);
    }
    foreach ($newarray as $list){
      $mysql_query4 = mysql_query("select * from homework where id='$list'");
      $homework = mysql_fetch_array($mysql_query4);
      $title = $homework['title'];
      $deadline = $homework['deadline'];
      $total_points = $homework['total_points'];
      $mysql_query5 = mysql_query("select * from homework_students where homework_id='$list' and student_id='$student_id'");
      $student_homework = mysql_fetch_array($mysql_query5);
      //$mysql_query6 = mysql_query("select earned_points from homework_students where course_id='$course_id' and student_id='$student_id'");
      //$earned_points = mysql_fetch_array($mysql_query6);
      echo "<tr>";
      echo "<td>" . $title . "</td>";
      echo "<td>" . $deadline . "</td>";
      echo "<td>" . $student_homework['earned_points'] . "</td>";
      echo "<td>" . $total_points . "</td>";
      echo "<td>Files</td>";
      echo "<td>" . $student_homework['note'] . "</td>";
      echo "<td>" . $student_homework['feedback'] . "</td>";
      echo "<script>
	    function enterScore() { 
	    var score = prompt(\"Please enter score\", \"\");
	    if(score)
	    window.location.href = \"enterScore.php?id=$course_id&banner=$banner_id&stdid=$student_id&hwid=$list&score=\" + score;
	    }
	    </script>";
      //echo "<script type="text/javascript">enterScore();</script>";
      //$temp = "&hwid=$list";
      echo "<td><a href=\"javascript:enterScore();\">Enter Score</a></td>";
      echo "</tr>";
    }
    echo "</table>";
   /*<dl>
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
