
<?php
//if(!empty($_POST['newCourse'])) {
//  foreach($_POST['newCourse'] as $check) {
//    echo $check;
//  }
//}
include('conn.php');
$query = mysql_query("select * from courses");
$row = mysql_fetch_array($query);
echo "<table border='1'>
<tr>
<th>Name and Section</th>
<th>Semester</th>
<th>Year</th>
<th>Select</th>
</tr>";
while($row)
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "." . $row['section'] . "</td>";
  echo "<td>" . $row['semester'] . "</td>";
  echo "<td>" . $row['course_year'] . "</td>";
  echo "<td><input type=\"CHECKBOX\" name=\"newCourse[]\" value=\"$row['id']\"></td>";
  echo "</tr>";
  }
echo "</table>"

echo 
//$row['id']=$_POST['newCourse[]'];
?>
