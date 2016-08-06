<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      fieldset{
      font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
<form id="upload" action="" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>HTML File Upload (Max. 5 files, Max. 1MB per file)</legend>

<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="1048576" />

<div>
  <label for="fileselect">Files to upload:</label>
  <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
</div>

<div id="submitbutton">
  <button type="submit">Upload Files</button>
</div>

</fieldset>

</form>

<div id="messages">

</div>
<?php
session_start();
include ('conn.php');
$max_files=5;    //最多上传文件的个数，与 up.htm 中的 input file 控件的个数相同
$up_ok_files=0;     //成功上传的文件个数
$up_folder="/export/mathcs/home/student/l/lchen22/WWW/upload";   //保存上传文件的目标文件夹
$hwid = $_GET['hwid'];
$user_id = $_GET['uid'];
if(isset($_FILES['fileselect'])){
   //由于 $_FILES['fileselect'] 是个数组，所以需要使用循环遍历
   for($i=0;$i<$max_files;$i++){
    //如果未出错
    if($_FILES['fileselect']['error'][$i]==0){
     if(move_uploaded_file($_FILES['fileselect']['tmp_name'][$i],$up_folder . "/" . $_FILES['fileselect']['name'][$i])){
       //成功上传后，计数器增 1
      $up_ok_files += 1;
      echo "<hr>";
      echo "File name: " . $_FILES["fileselect"]["name"][$i] . "<br />";
      echo "File type: " . $_FILES["fileselect"]["type"][$i] . "<br />";
      echo "File size: " . ($_FILES["fileselect"]["size"][$i] / 1024) . " Kb<br />";
      $oldname = pathinfo($_FILES["fileselect"]["name"][$i]);
      $filename = $oldname['filename'];
      $extension = $oldname['extension'];
      $current_server_time = date("Y-m-d") . date("h:i:sa");
      $mysql_date = date("Y-m-d H:i:s", strtotime($current_server_time));
      $newname = $user_id . "_" . $hwid . "_"  . $mysql_date . "_" . $filename . "." . $extension;
      rename("/export/mathcs/home/student/l/lchen22/WWW/upload/" . $_FILES["fileselect"]["name"][$i], "/export/mathcs/home/student/l/lchen22/WWW/upload/" . $newname);
      $mysql_query = mysql_query("insert into files(filename,user_id,hw_id) values('$newname','$user_id','$hwid')");
     }
    }
    else{
     echo "<h4 style='color:red;'>Upload failed!</h4>";
    }
   }
   echo "<h4>Total " . $up_ok_files . " file(s) uploaded.</h4>";    
}
//print_r($_FILES['fileselect']);



/*if ($_FILES["file"]["error"] > 0)
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
  }*/
?>
  </body>
  </html>
