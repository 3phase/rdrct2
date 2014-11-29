<?
class Connect_To_DB {

	function __construct($server, $user, $password, $selected_db) {
		if (isset($connect) || !isset($connect)) {	
			$connect = mysql_connect($server, $user, $password);
			if(!$connect) {
				die("An error appeared while trying to connect to hosting port and account.");
			}
			mysql_select_db($selected_db);
		}
	}

	function close_db() {
		mysql_close();
	}

}
?>