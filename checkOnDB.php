	<html>

	<?php
	include('manager/users.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$users = new Users;
	$user = $users->getUserInfo($username,$password);
	retrieveFromDb($user);

	function retrieveFromDb($user) {

			$rows =$user->num_rows;
			if ($rows=='1'){
				while($row= $user->fetch_assoc()){
					session_start();					
					$_SESSION['usr']=$row['Username'];
  					$_SESSION['pw']=$row['Password'];
  					$_SESSION['loggedin']= true;
  					$_SESSION['wrongInfo']= false;
				}
			}else{
				session_start();
				$_SESSION['wrongInfo']= true;
			}
			
		}
	echo"<script type='text/javascript'>location.href ='" . $_SERVER['HTTP_REFERER'] . "';</script>"
	?>

	<script type='text/javascript'>location.href = 'index.php';</script>
	</html>