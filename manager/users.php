<?php

include('bd-access.php');

class Users{

	public function getUserInfo(){
			$query= "SELECT * FROM usernames WHERE username = '" . $_POST['username'] . "' AND Password = '" . $_POST['password'] . "'";
			$dbAccess = new DBAccess;
			$select = $dbAccess->select($query);
			return $select;
		}

	}

?>