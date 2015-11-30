<?php

include('bd-access.php');

class Userfullname{

	public function getUserfullname($username, $password){
			session_start();
			$query= "SELECT * FROM usernames WHERE username = '" . $username . "' AND Password = '" . $password . "'";
			$dbAccess = new DBAccess;
			$select = $dbAccess->select($query);
			return $select;
		}

	}

?>