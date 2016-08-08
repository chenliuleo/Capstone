
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      }
      th, td {
      padding: 5px;
      }
      table {font-family: Arial, Helvetica, sans-serif;}
    </style>
  </head>
  <body>
  <!--<h3>Course this semester: <br></h3>
  <h3>Homework: <br></h3>
  <h3>Coming due: <br></h3>-->
  <?php
  session_start();
  include('conn.php');
  echo "Welcome!";
  echo "<br>";
  include('conn.php');
$username = $_SESSION['username'];
$user_query = mysql_query("select * from users where username='$username'");
$user_array = mysql_fetch_array($user_query);
$uid = $user_array['id'];
$course_query = mysql_query("select course_id from courses_faculty where faculty_id='$uid'");
$cid = Array();
while ($aaa = mysql_fetch_row($course_query)){
    array_push($cid,$aaa[0]);
}
//$query = mysql_query("select * from courses");
echo "<table border='1'>
<tr>
<th>Name and Section</th>
<th>Semester</th>
<th>Year</th>
<th>Description</th>
<th>Start date</th>
<th>End Date</th>
</tr>";
echo "<form method=\"get\" action=\"fDelete.php\">";
foreach($cid as $tempcid){
    $query = mysql_query("select * from courses where id='$tempcid'");
    while($row = mysql_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "." . $row['section'] . "</td>";
    echo "<td>" . $row['semester'] . "</td>";
    echo "<td>" . $row['course_year'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['start_date'] . "</td>";
    echo "<td>" . $row['end_date'] . "</td>";
    //echo "<td><input type=\"CHECKBOX\" name=\"newCourse[]\" id=\"newCourse\" value=\"$row[id]\"></td>";
    echo "</tr>";
  }
}
  //echo "Coming due: ";
  echo "<br>";
  echo "<a href='addACourse.php'>Add a course</a>";  
  echo "<br>";
  echo "<a href='fDeleteCourse.php'>Delete a course</a>";
  ?>
  </body>
</html>
