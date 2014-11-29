<?
include '../incl/engine/conn.inc.php';
include_once '../incl/engine/ip_operations.php';

$connection = new Connect_To_DB("localhost", "username", "password", "database");
log_ip();

if($_SERVER["QUERY_STRING"]==NULL){
	header("Location: http://localhost/rdrct/");
} else {
	$linkurl = "http://localhost/rdrct/r/" . $_SERVER["QUERY_STRING"];
	$sql = "SELECT longURL FROM rdrct2 WHERE shortURL = '$linkurl'" ;
	$result = mysql_query($sql);
	if ($result){
		$row = mysql_fetch_array($result);
		while($row!=0){
			$longurl = $row['longURL'];
			header("Location: $longurl");
			exit;
		}
	} else{
		header("Location: http://localhost/rdrct/");
		exit;
	}
}
?>