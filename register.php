<?php
$con = mysql_connect("localhost:3306","root","930624");
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
mysql_select_db("test", $con);
$username="<script>document.write(newUserName);</script>"
$userpass="<script>document.write(sha);</script>"
$bannerid="<script>document.write()"
mysql_query("INSERT INTO test ($username)")
?>