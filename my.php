<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['username'])){
	header("Location:login.html");
	exit();
}

//�������ݿ������ļ�
include('conn.php');
$banner_id = $_SESSION['banner_id'];
$username = $_SESSION['username'];
$user_query = mysql_query("select * from users where banner_id=$banner_id limit 1");
$row = mysql_fetch_array($user_query);
echo 'User information:<br />';
echo 'Banner ID: ',$banner_id,'<br />';
echo 'Username: ',$username,'<br />';
echo 'Email address: ',$row['email'],'<br />';
echo '<a href="login.php?action=logout">Logout</a><br />';
//$type = mysql_query("select user_type from users where username=$username");
if($row['user_type'] = 'Student')
{
  echo 'Click here to <a href="mainpage.html">Main page</a>';
}
else
{
  echo 'Click here to <a href="fMainpage.html">Main page</a>';
}
?>