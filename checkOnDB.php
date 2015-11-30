	<html>

	<?php
	include('manager/users.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$users = new Users;
	$user = $users->getUserInfo($username,$password);
	retrieveFromDb($user);

	function retrieveFromDb($user) {
			session_start();
			$rows =$user->num_rows;
			if ($rows=='1'){
				while($row= $user->fetch_assoc()){					
					$_SESSION['usr']=$row['Username'];
  					$_SESSION['pw']=$row['Password'];
  					$_SESSION['loggedin']= true;
  					$_SESSION['wrongInfo']= false;
				}
			}else{
				$_SESSION['wrongInfo']= true;
			}
			
		}
	echo"<script type='text/javascript'>location.href ='" . $_SERVER['HTTP_REFERER'] . "';</script>"
	?>

	</html>