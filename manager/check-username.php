<?php

include('bd-access.php');

class checkUsername{

	public function getUsername(){
			$query= "SELECT * FROM usernames WHERE username = '" . $_POST['username'] . "'";
			$dbAccess = new DBAccess;
			$select = $dbAccess->select($query);
			return $select;
		}

	}

?>