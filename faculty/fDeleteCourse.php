<?php
session_start();
//if(!empty($_POST['newCourse'])) {
//  foreach($_POST['newCourse'] as $check) {
//    echo $check;
//  }
//}
include('conn.php');
$username = $_SESSION['usernmae'];
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
<th>Select</th>
</tr>";
echo "<form method=\"get\" action=\"checkbox.php\">";
foreach($cid as $tempcid){
    $query = mysql_query("select * from courses where id='$tempcid'");
    while($row = mysql_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "." . $row['section'] . "</td>";
    echo "<td>" . $row['semester'] . "</td>";
    echo "<td>" . $row['course_year'] . "</td>";
    echo "<td><input type=\"CHECKBOX\" name=\"newCourse[]\" id=\"newCourse\" value=\"$row[id]\"></td>";
    echo "</tr>";
  }
}

echo"</table>";
echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">";
echo "</form>"; 
 
?>