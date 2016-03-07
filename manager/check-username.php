<?php

include('bd-access.php');

class checkUsername{

	public function getUsername(){
			$query= "SELECT * FROM usernames WHERE username = '" . $_POST['username'] . "'";
			$dbAccess = new DBAccess;
			$select = $dbAccess->select($query);
			return $select;
		}

	public function addUser($u,$p,$f,$l){
			$query= "INSERT INTO usernames VALUES (" . $u . "," . $p . "," . $f . "," . $l . ")";
			$dbAccess = new DBAccess;
			$dbAccess->insert($query);
		}

	}

?>