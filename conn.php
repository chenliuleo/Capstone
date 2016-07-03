<?php
/*****************************
*数据库连接
*****************************/
$connection = ssh2_connection("turing.slu.edu",22);
if (ssh2_auth_password($connection, "sshusername", "sshpassword")){
  echo "Authentication Successful!\m";
}
else{
  die("Authentication Failed...");
}
$stream = ssh2_exec($connection, 'mysql -ucsp_homework -pP7a4H^3zHomework;use csp_homework;');

//$conn = @mysql_connect("localhost","root","root123");
//if (!$conn){
//	die("连接数据库失败：" . mysql_error());
//}
//mysql_select_db("test", $conn);
//字符转换，读库
//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");
?>