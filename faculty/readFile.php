<html>
<head>
  <style>
    p{font-family: Arial, Helvetica, sans-serif;}
  </style>
</head>
<body>
<form action="" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
<?php
session_start();
include('conn.php');
$course_id = $_GET['id'];
$course_sql = mysql_query("select * from courses where id='$course_id'");
$course_array = mysql_fetch_array($course_sql);
echo "<p>Course Name: " . $course_array['name'];
echo "<br>";
echo "Section: " . $course_array['section'];
echo "<br>";
echo "Description: " . $course_array['description'];
echo "<br>";
echo "Semester and year: " . $course_array['semester'] . " " . $course_array['course_year'];
echo "<br>";
echo "</p><hr>";
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
elseif($_FILES["file"]["name"] != "")
  {
  echo "<p>File name: " . $_FILES["file"]["name"] . "<br />";
  echo "File type: " . $_FILES["file"]["type"] . "<br />";
  echo "File size: " . $_FILES["file"]["size"] . " bytes<br />";
  echo "Temp file stored in: " . $_FILES["file"]["tmp_name"] . $_FILES["file"]["name"] . "</p><br/>";
  move_uploaded_file($_FILES["file"]["tmp_name"],
  "/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"]);
  echo "<p>File stored in: " . "/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"];
  //rename("/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"],
  //"/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"]);
  echo "<br>Upload successful!<br></p>";
  $filename = $_FILES["file"]["name"];
  echo "<hr>";
  }
//echo "<input type=\"file\" id=\"file\" name=\"file[]\"/>";

$handle = @fopen("/export/mathcs/home/student/l/lchen22/WWW/upload/$filename", "r");
$student_banner = array();

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        //var_dump($buffer);
        array_push($student_banner,$buffer);
        //var_dump($student_banner);
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
   //print_r($student_banner);
}
$count = 0;
function trim_value(&$value)
{
  $value = trim($value);
}
array_walk($student_banner, 'trim_value');
//var_dump($student_banner);
foreach ($student_banner as $slist){
  $sql1 = mysql_query("select * from users where banner_id='$slist'");
  //var_dump($sql1);
  $sql2 = mysql_fetch_array($sql1);
  //var_dump($sql2);
  $sql3 = $sql2['id'];
  //var_dump($sql3);
  $sql4 = mysql_query("insert into course_students(student_id,course_id) values('$sql3','$course_id')");
  $sql5 = $sql2['first_name'];
  $sql6 = $sql2['last_name'];
  echo $slist . " " . $sql5 . " " . $sql6 . " read!";
  echo "<br>";
  if ($sql5 || $sql6 == ""){
    echo $slist . " imported failed!";
  }
  else{
    $count += 1;
  }
}
if($count > 0){
  if($count == 1) {
    echo "Total " . $count . " student imported!";
  }
  else{
    echo "Total " . $count . " students imported!";
  }
}
//else echo "<p>Import failed!</p>";

?>
</body>
</html>
