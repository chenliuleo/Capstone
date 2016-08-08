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

echo "<hr>";

echo "<script language=JavaScript>";
echo "function InputCheck(RegForm)";
echo "{";
echo "  if (RegForm.username.value == "")";
echo "  {";
echo "    alert(\"Username cannot be empty!\");";
echo "    RegForm.username.focus();";
echo "    return (false);";
echo "  }";
echo "  if (RegForm.password.value == \'\')";
echo "  {";
echo "    alert(\"Password cannot be empty!\");";
echo "    RegForm.password.focus();";
echo "    return (false);";
echo "  }";
echo "  if (RegForm.repass.value != RegForm.password.value)";
echo "  {";
echo "    alert(\"Password doesn't match!\");";
echo "    RegForm.repass.focus();";
echo "    return (false);";
echo "  }";
echo "  if (RegForm.email.value == \"\")";
echo "  {;"
echo "    alert(\"Email address cannot be empty!\");";
echo "    RegForm.email.focus();";
echo "    return (false);";
echo "  }";
echo "  if (RegForm.bannerid.value == \"\")";
echo "  {";
echo "    alert(\"Banner ID format error!\");";
echo "    RegForm.bannerid.focus();";
echo "    return (false);";
echo "  }";
echo "}";
echo "</script>";
echo "<div>";
echo "<fieldset>";
echo "<legend>User Sign Up</legend>";
echo "<form name=\"RegForm\" method=\"post\" action=\"regAdmin.php\" onSubmit=\"return InputCheck(this)\">";
echo "<p>";
echo "<label for=\"username\" class=\"label\">Username:</label>";
echo "<input id=\"username\" name=\"username\" type=\"text\" class=\"input\" />";
echo "<span>(Use SLU email credential. (like gpeter12, not gpeter12@slu.edu))</span>";
echo "<p/>";
echo "<p>";
echo "<label for=\"password\" class=\"label\">Password:</label>";
echo "<input id=\"password\" name=\"password\" type=\"password\" class=\"input\" />";
echo "<span>(Cannot be empty, 8 to 16 characters.)</span>";
echo "<p/>";
echo "<p>";
echo "<label for=\"repass\" class=\"label\">Confirm password:</label>";
echo "<input id=\"repass\" name=\"repass\" type=\"password\" class=\"input\" />";
echo "<p/>";
echo "<p>";
echo "<label for=\"bannerid\" class=\"label\">Banner ID:</label>";
echo "<input id=\"bannerid\" name=\"bannerid\" type=\"text\" class=\"input\" />";
echo " <span>(Cannot be empty, including \"000\".)</span>";
echo "<p/>";
echo "<p>";
echo "<label for=\"first_name\" class=\"label\">First Name:</label>";
echo "<input id=\"first_name\" name=\"first_name\" type=\"text\" class=\"input\" />";
echo "<span>(Cannot be empty.)</span>";
echo "<p/>";
echo "<p>";
echo "<label for=\"last_name\" class=\"label\">Last Name:</label>";
echo "<input id=\"last_name\" name=\"last_name\" type=\"text\" class=\"input\" />";
echo "<span>(Cannot be empty.)</span>";
echo "<p/>";
echo "<p>";
echo "<label for=\"user_type\" class=\"label\">User Type:</label>";
echo "<input type=\"radio\" name=\"userType\" value=\"Student\"> Student";
echo "<input type=\"radio\" name=\"userType\" value=\"Faculty\"> Faculty<br>";

echo "<p/>";
echo "<p>";
echo "<input type=\"submit\" name=\"submit\" value=\"Submit\" class=\"left\" />";
echo "</p>";
echo "</form>";
echo "</fieldset>";
echo "</div>";
?>
</body>
</html>
