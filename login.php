 
<?php
session_start();

//注销登录
if($_GET['action'] == "logout"){
	unset($_SESSION['banner_id']);
	unset($_SESSION['username']);
	echo 'Bye! Click here <a href="login.html">Login</a>';
	exit;
}

//登录
/*if(!isset($_POST['submit'])){
	exit('Permission denied!');
}*/
$username = htmlspecialchars($_POST['username']);
$password = sha1($_POST['password']);
//echo $username;
//echo $password;
//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select username from users where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
	//登录成功
	$_SESSION['username'] = $username;
	$_SESSION['banner_id'] = $result['banner_id'];
	//echo 'Login success! <br />';
	//echo $username,' Welcome!This is <a href="my.php">Home page</a><br />';
	//echo 'Click here to <a href="login.php?action=logout">logoff</a><br />';
	//$username = $_SESSION['username'];
	$user_query = mysql_query("select * from users where username='$username' limit 1");
	$row = mysql_fetch_array($user_query);
	//echo 'User information:<br />';
	//echo 'Banner ID: ',$row['banner_id'],'<br />';
	//echo 'Username: ',$username,'<br />';

	//echo 'User type: ',$row['user_type'],'<br />';
	//echo '<a href="login.php?action=logout">Logout</a><br />';

	if($row['user_type'] == 'Student')
	{
	  echo "<meta http-equiv=\"refresh\" content=\"0; ./student/mainpage.html\" />";
	}
	elseif($row['user_type'] == 'Admin')
	{
	  echo "<meta http-equiv=\"refresh\" content=\"0; ./addCourseHtml.php\" />";
	}
	else
	{
	  echo "<meta http-equiv=\"refresh\" content=\"0; ./faculty/fMainpage.html\" />";
	}
	exit;
	} 
else {
  exit('Login failed! Click here <a href="javascript:history.back(-1);">back</a> Try again');

}
?>
