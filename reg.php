<?php
if(!isset($_POST['submit'])){
	exit('Permission denied!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	exit('Error: Username does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(strlen($password) < 8){
	exit('Error: Password length does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('^\w+([-+.]\w+)*@slu.edu$', $email)){
	exit('Error: Email address does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('^000[0-9]{6}$', $bannerid)){
	exit('Error: Banner ID does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('/^[a-zA-Z]+$/', $first_name)){
	exit('Error: First Name does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('/^[a-zA-Z]+$/', $last_name)){
	exit('Error: Last Name does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
//包含数据库连接文件
include('conn.php');
//检测用户名是否已经存在
$check_query = mysql_query("select username from users where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Username ',$username,' exists.<a href="javascript:history.back(-1);">Back</a>';
	exit;
}
$check_query = mysql_query("select banner_id from users where banner_id='$banner_id' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Banner ID ',$banner_id,' exists.<a href="javascript:history.back(-1);">Back</a>';
	exit;
}
$check_query = mysql_query("select email from users where email='$email' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Email address ',$email,' exists.<a href="javascript:history.back(-1);">Back</a>';
	exit;
}
//写入数据
$password = sha1($password);
$sql = "INSERT INTO users(username,password,email,bannerid,first_name,last_name,user_type)VALUES('$username','$password','$email','$banner_id','$first_name','$last_name','$user_type')";
if(mysql_query($sql,$stream)){
	exit('Sigh up success! Click here<a href="login.html">to login</a>');
} else {
	echo 'Sorry! Database error:',mysql_error(),'<br />';
	echo 'Click here <a href="javascript:history.back(-1);">back</a> Try again.';
}
?>
