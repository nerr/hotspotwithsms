<?php
/*
 *
 */
$config = array(
	'pageTitle' = 'Free Wi-Fi Hotspot',
);

class hotspotsmsauth
{
	
	public function auth($mp, $pass)
	{
		$tm = now();
		$sql = "select * from authlog where mobilephone=$mp and smspass=$pass and logtime<$tm";
	}

	private function log2db()
	{

	}
	
	private function sendsms()
	{

	}

	private function makepass()
	{

		return $pass;
	}
}

?>