 
<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
	header("Location:login.html");
	exit();
}

//包含数据库连接文件
include('conn.php');

$username = $_SESSION['username'];
$user_query = mysql_query("select * from users where username='$username' limit 1");
$row = mysql_fetch_array($user_query);
echo 'User information:<br />';
echo 'Banner ID: ',$row['banner_id'],'<br />';
echo 'Username: ',$username,'<br />';

echo 'User type: ',$row['user_type'],'<br />';
echo '<a href="login.php?action=logout">Logout</a><br />';

if($row['user_type'] == 'Student')
{
  echo 'Click here to <a href="./student/mainpage.html">Main page</a>';
}
else
{
  echo 'Click here to <a href="./faculty/fMainpage.html">Main page</a>';
}
?>