<html>
<head>
<style>
  p{font-family: Arial, Helvetica, sans-serif;}
</style>
</head>
<body>
<?php
session_start();
include ('conn.php');

$course_id = $_GET['id'];
$homework_id = $_GET['hwid'];
$uid = $_GET['uid'];


$get_file_sql = mysql_query("select id from files where user_id='$uid' and hw_id='$homework_id' order by submit_time,filename");
$get_file_array = Array();
while($file_id = mysql_fetch_row($get_file_sql)){
  array_push($get_file_array,$file_id[0]);
}
if(sizeof($get_file_array)==0){
  echo "There is no attachment!";
}
else{
foreach($get_file_array as $fid){
  $get_filename = mysql_query("select * from files where id='$fid'");
  $filename_array = mysql_fetch_array($get_filename);
  $filename = $filename_array['filename'];
  $file_id = $filename_array['id'];
  echo "<p>File name: ";
  echo $filename;
  echo " ";
  echo "<a href=\"http://turing.slu.edu/~lchen22/cgi-bin/download.py?name=/export/mathcs/home/student/l/lchen22/WWW/upload/$filename\">Download</a>";
  echo " ";
  echo "<a href=\"deleteFile.php?fid=$file_id&id=$course_id&hwid=$homework_id&uid=$uid\">Delete</a>";
  echo "<br><p/>";
}
}
echo "<hr>";
echo "<a href=\"facultyCourse.php?id=$course_id\">back</a>";

?>
</body>
</html>
