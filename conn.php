<?php
/*****************************
*数据库连接
*****************************/

$conn = mysql_connect("127.0.0.1","csp_homework","P7a4H^3zHomework");
if (!$conn){
	die("连接数据库失败：" . mysql_error());
}
echo "database connection successful!";
mysql_select_db("csp_homework");
//mysql_select_db("test", $conn);
//字符转换，读库
//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");

$check_query = mysql_query("select username from users where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
	echo 'Error: Username ',$username,' exists.<a href="javascript:history.back(-1);">Back</a>';
	     exit;
	     }
	     echo "username check passed!";
	     $check_query = mysql_query("select banner_id from users where banner_id='$bannerid' limit 1");
	     if(mysql_fetch_array($check_query)){
		echo 'Error: Banner ID ',$bannerid,' exists.<a href="javascript:history.back(-1);">Back</a>';
		     exit;
		     }
		     echo "bannerid check passed!";
		     $check_query = mysql_query("select email from users where email='$email' limit 1");
		     if(mysql_fetch_array($check_query)){
			echo 'Error: Email address ',$email,' exists.<a href="javascript:history.back(-1);">Back</a>';
			     exit;
			     }
			     echo "email check passed!";
			     //写入数据
			     $password = sha1($password);
			     echo "password hashed!";
			     $sql = "INSERT INTO users(username,password,email,banner_id,first_name,last_name,usertype)VALUES('$username','$password','$email','$bannerid','$first_name','$last_name','$user_type')";
			     echo "mysql query made!";
			     if(mysql_query($sql,$conn)){
				exit('Sign up success! Click here<a href="login.html">to login</a>');
				} else {
				  echo 'Sorry! Database error:',mysql_error(),'<br />';
				       echo 'Click here <a href="javascript:history.back(-1);">back</a> Try again.';
				       }
?>