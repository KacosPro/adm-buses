	<?php
	include('manager/check-username.php');
	//include('manager/add-user.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['nombre'];
	$lastname = $_POST['apellido'];
	$users = new checkUsername;
	$user = $users->getUsername($username);
	//$add = new addUsername;
	retrieveUsernameDb($user);

	function retrieveUsernameDb($user) {
			session_start();
			$rows =$user->num_rows;
			if ($rows=='1'){
				while($row= $user->fetch_assoc()){					
  					$_SESSION['repeatedInfo']= true;
  					echo"<script type='text/javascript'>location.href ='" . $_SERVER['HTTP_REFERER'] . "';</script>";
				}
			}else{
				$users->addUser($username,$password,$nombre,$apellido);
				$_SESSION['repeatedInfo']= false;
				$_SESSION['loggedin']=true;
				if ($_SESSION['previouspage'] !="http://localhost/adm-busess/login.php"){
					echo"<script type='text/javascript'>location.href ='index.php';</script>";
				}else{
					echo"<script type='text/javascript'>location.href ='purchase.php';</script>";
				}
			}
			
		}
	?>
