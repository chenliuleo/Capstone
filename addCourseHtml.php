<html>
<head>
</head>
<body>
<?php
session_start();
include('conn.php');
$query = mysql_query("select * from courses");
echo "<h1>Delete courses: </h1><br>";
echo "<table border='1'>
<tr>
<th>Name and Section</th>
<th>Semester</th>
<th>Year</th>
<th>Description</th>
<th>Start date</th>
<th>End Date</th>
<th>Select</th>
</tr>";
echo "<form method=\"get\" action=\"deleteCourse.php\">";
while($row = mysql_fetch_array($query))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "." . $row['section'] . "</td>";
  echo "<td>" . $row['semester'] . "</td>";
  echo "<td>" . $row['course_year'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['start_date'] . "</td>";
  echo "<td>" . $row['end_date'] . "</td>";
  //$id = $row['id'];
  echo "<td><input type=\"CHECKBOX\" name=\"newCourse[]\" id=\"newCourse\" value=\"$row[id]\"></td>";
  echo "</tr>";
  }
echo"</table>";
echo "<input type=\"submit\" name=\"submit\" value=\"Delete\">";
echo "</form>"; 

echo "<hr>";
echo "<h1>Add a course:</h1><br>";
echo "<form action='addCourse.php' name='course' method='post'>";
echo "Course number: (example format: CSCI1234)<br>";
echo "<input id='name' name='name' type='text' maxlength='8' size='8'><br>";
echo "Course title: (example format: 01)<br>";
echo "<input id='section' name='section' type='text' maxlength='2' size='2'><br>";
echo "Course title:<br>";
echo "<input id='description' name='description'><br>";
echo "Year: (example format: 2016)<br>";
echo "<input id='course_year' name='course_year' type='text' maxlength='4' size='4'><br>";
echo "Semester: (example format: 'Spring', 'Summer', 'Fall')<br>";
echo "<input id='semester' name='semester' maxlength='6' size='6'><br>";
echo "Start date: <br>";
echo "<input id='start_date' name='start_date' type='date'><br>";
echo "End date: <br>";
echo "<input id='end_date' name='end_date' type='date'><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";
?>
</body>
</html>
