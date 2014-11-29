<?
function check_if_url_contains_protocol_specials($url) {
	// check if url contains protocol specials ://
	$query = strpos($url,"://");                  
	if($query==FALSE){
		$url = "http://" . $url;
	}
	return $url;
}

function generate_hashcode_of_url() {
	$code = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 5)), 0, 5);
	$url = "http://localhost/rdrct/r/" . $code;
	return $url;
}
?>