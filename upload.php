<?php
$strServer = 'turing.slu.edu';
$strServerPort = '22';
$strServerUsername = 'username';
$strServerPassword = 'password';

$resConnection = ssh2_connect($strServer, $strServerPort);

if(ssh2_auth_password($resConnection, $strServerUsername, $strServerPassword)){
$resSFTP = ssh2_sftp($resConnection);
echo $resSFTP;
$filename = '
