<?php
/*****************************
*���ݿ�����
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
//	die("�������ݿ�ʧ�ܣ�" . mysql_error());
//}
//mysql_select_db("test", $conn);
//�ַ�ת��������
//mysql_query("set character set 'gbk'");
//д��
//mysql_query("set names 'gbk'");
?>