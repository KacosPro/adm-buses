<?php
	include('manager/user-fullname.php');
	include_once "manager/Old.php";
	include_once "manager/Adapter.php";

	session_start();
	$username = $_SESSION['usr'];
	$password = $_SESSION['pw'];
	$users = new Userfullname;
	$user = $users->getUserfullname($username,$password);

	$rows =$user->num_rows;
	if ($rows=='1'){
		while($row= $user->fetch_assoc()){					
			$firstname=$row['firstName'];
			$lastname=$row['lastName'];
			
		}
	}

	$person = new Old($firstname, $lastname);
	$newSystem = new Adapter ($person->getName(),$person->getlastname());
	print_r($newSystem->getName());
	
	return $newSystem->getName();

?>