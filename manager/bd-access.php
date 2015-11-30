<?php

include('database.php');

/**
 *
 */

class DBAccess {

	function insert($query) {
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$mysqli->query($query);
	}

	function select($query) {
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($query);
		return $result;
	}
}

?>