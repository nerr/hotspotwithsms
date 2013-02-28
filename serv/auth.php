<?php
$config = array(
	'fetionAccount'  => '13524289996',
	'fetionPassword' => 'nerr5257',
	'fetionTrytime'  => 3,
);

require 'class/PHPFetion.php';

function check_status($status_code)
{
   preg_match( '/^.*HTTP\/1\.1 200 OK.*$/si', $status_code, $status );
   if ( isset($status[0]) ){
     return true;
   }else{
     echo "Result:$status_code\n";
     return false;
   }
}

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



?>