<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      p,a{
      font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
<?php
session_start();
include ('conn.php');
$hwid = $_GET['hwid'];
$fid = $_GET['fid'];
$cid = $_GET['cid'];
$file_sql = mysql_query("select id from files where hw_id='$hwid' and user_id='$fid'");
$file_array = Array();
while ($file_push = mysql_fetch_row($file_sql)){
  array_push($file_array, $file_push[0]);
}
if (sizeof($file_array)>0){
echo "Download link:";
echo "<br>";
foreach($file_array as $file_id){
  $filename = mysql_query("select filename from files where id='$file_id'");
  $array = mysql_fetch_array($filename);
  $name = $array['filename'];
  echo "<a href=\"http://turing.slu.edu/~lchen22/cgi-bin/download.py?name=/export/mathcs/home/student/l/lchen22/WWW/upload/$name\">$name</a>";
}  
}
else {echo "<p>There is no attached file.";}
echo "<br></p><a href=\"sCourse.php?id=$cid\">Back</a>";
?>
  </body>
</html>
