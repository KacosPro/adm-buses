<?php

include('bd-access.php');

class Users{

	public function getUserInfo(){
			$query= "SELECT * FROM Usernames WHERE Username = '" . $_POST['username'] . "' AND Password = '" . $_POST['password'] . "'";
			$dbAccess = new DBAccess;
			$select = $dbAccess->select($query);
			return $select;
		}

	}

?>