<?php
/*****************************
*数据库连接
*****************************/

$conn = mysql_connect("127.0.0.1","csp_homework","P7a4H^3zHomework");
if (!$conn){
	die("连接数据库失败：" . mysql_error());
}
//echo "database connection successful!";
mysql_select_db("csp_homework");
//mysql_select_db("test", $conn);
//字符转换，读库
//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");
?>