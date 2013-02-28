<?php
$config = array(
	'smsAccount'  => '13524289996',
	'smsPassword' => 'nerr5257',
	'smsTrytime'  => 3,
);

require 'class/PHPFetion.php';


/*$fetion = new PHPFetion($config['fetionAccount'], $config['fetionPassword']);
try
{
	$result = $fetion->send($config['fetionAccount'], 'hello test');
	$count = 0;
	while( ! check_status( $result ) && $count < $config['fetionAccount'] )
	{
		$count++;
		sleep(2);
		echo "Sleep 2s, Re Send\n";
		$result = $result = $fetion->send($config['fetionAccount'], 'hello test');
	}
	if ( $count != ( $config['fetionAccount']-- ) ){
		echo "Date:".date('Y-m-d H:i:s', time()).";Finished\n";
	}else{
		echo "Date:".date('Y-m-d H:i:s', time()).";Failed\n";
	}
}
catch( Exception $e)
{
	echo "Date:".date('Y-m-d H:i:s', time()).";ERROR:".$e."\n";
}*/



function getRandCode($bit)
{
	$code = '';
	for($i = 0; $i < $bit; $i++)
	{
		$code .= rand(0,9);
	}
	return $code;
}


?>