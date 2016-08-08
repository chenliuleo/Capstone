 
<?php
if(!isset($_POST['submit'])){
	exit('Permission denied!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$bannerid = $_POST['bannerid'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_type = $_POST['userType'];
//echo $email;
//echo $user_type;
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	exit('Error: Username does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(strlen($password) < 8){
	exit('Error: Password length does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
//if(!preg_match('/^[a-zA-Z0-9]+@slu.edu$/', $email)){
//	exit('Error: Email address does not qualified.<a href="javascript:history.back(-1);">Back</a>');
//}
if(!preg_match('/^000[0-9]{6}$/', $bannerid)){
	exit('Error: Banner ID does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('/^[a-zA-Z]+$/', $first_name)){
	exit('Error: First Name does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('/^[a-zA-Z]+$/', $last_name)){
	exit('Error: Last Name does not qualified.<a href="javascript:history.back(-1);">Back</a>');
}
//echo "information check passed!";
//包含数据库连接文件
include ('conn.php');
//echo $conn;
//if ((include 'conn.php') == TRUE){
//  echo 'using conn.php successful!';
//}
//else{
//  echo 'using conn.php failed!';
//}
//检测用户名是否已经存在
$check_query = mysql_query("select username from users where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Username ',$username,' exists.<a href="javascript:history.back(-1);">Back</a>';
	exit;
}
//echo "username check passed!";
$check_query = mysql_query("select banner_id from users where banner_id='$bannerid' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Banner ID ',$bannerid,' exists.<a href="javascript:history.back(-1);">Back</a>';
	exit;
}
//echo "bannerid check passed!";
//$check_query = mysql_query("select email from users where email='$email' limit 1");
//if(mysql_fetch_array($check_query)){
//	echo 'Error: Email address ',$email,' exists.<a href="javascript:history.back(-1);">Back</a>';
//	exit;
//}
//echo "email check passed!";
//写入数据
$password = sha1($password);
//echo "password hashed!";
$sql = "INSERT INTO users(username,password,banner_id,first_name,last_name,user_type)VALUES('$username','$password','$bannerid','$first_name','$last_name','$user_type')";
//echo "mysql query made!";
if(mysql_query($sql,$conn)){
	exit('Sign up success! Click here<a href="login.html"> to login</a>');
} else {
	echo 'Sorry! Database error:',mysql_error(),'<br />';
	echo 'Click here <a href="javascript:history.back(-1);">back</a> Try again.';
}
?>
