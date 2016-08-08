<html>
<head>
</head>
<body>
<?php
session_start();
include('conn.php');
echo "<form action='' name='course' method='post'>";
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
