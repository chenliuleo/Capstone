<?php
session_start();

//ע����¼
if($_GET['action'] == "logout"){
	unset($_SESSION['banner_id']);
	unset($_SESSION['username']);
	echo 'Bye! Click here <a href="login.html">Login</a>';
	exit;
}

//��¼
if(!isset($_POST['submit'])){
	exit('Permission denied!');
}
$username = htmlspecialchars($_POST['username']);
$password = sha1($_POST['password']);

//�������ݿ������ļ�
include('conn.php');
//����û����������Ƿ���ȷ
$check_query = mysql_query("select username from users where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
	//��¼�ɹ�
	$_SESSION['username'] = $username;
	$_SESSION['banner_id'] = $result['banner_id'];
	echo 'Login success! <br />';
	echo $username,' Welcome!This is <a href="my.php">Home page</a><br />';
	echo 'Click here to <a href="login.php?action=logout">logoff</a><br />';
	exit;
} else {
	exit('Login failed! Click here <a href="javascript:history.back(-1);">back</a> Try again');
}
?>