<?php
$config = array(
	//-- SMS info
	'smsAccount'    => '13524289996',
	'smsPassword'   => 'nerr5257',
	'smsTrytime'    => 3,
	'smsTextPrefix' => '麻辣印象无线网络验证码:',
	'smsTextSuffix' => ',验证码5分钟内有效.感谢您的光临,祝您用餐愉快.',

	//-- MySQL info
	'dbUser' => 'root',
	'dbPass' => '911911',
	'dbName' => 'hotspot',
	'dbHost' => '127.0.0.1',
);

require 'class/hotspotsms.php';

$hotspot = new hotspotsms($config);

if($_GET['action'] == 'step1')
	$hotspot->step1();
elseif($_GET['action'] == 'step2')
	$hotspot->step2();
?>