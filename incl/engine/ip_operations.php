<?
function log_ip() {
	if($_SERVER['REMOTE_ADDR'] !== '77.70.100.163' && $_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
		$file = 'conqute.txt';
		$ipadress = $_SERVER['REMOTE_ADDR'];
		$date = date('d/F/Y h:i:s');
		$webpage = $_SERVER['SCRIPT_NAME'];
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$fp = fopen($file, 'a');
		fwrite($fp, $ipadress.' - ['.$date.'] '.$webpage.' '.$browser."\r\n");
		fclose($fp);
	}
}

function get_ip() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
		//Is it a proxy address
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
?>