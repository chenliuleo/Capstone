<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
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
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Temp file stored in: " . $_FILES["file"]["tmp_name"] . "<br />";
  move_uploaded_file($_FILES["file"]["tmp_name"],
  "/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"]);
  echo "Stored in: " . "/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"];
  //rename("/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"],
  //"/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["file"]["name"]);
  echo "Upload successful!";
  }
?>
  </body>
  </html>