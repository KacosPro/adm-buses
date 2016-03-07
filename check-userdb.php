	<?php
	include('manager/check-username.php');
	$users = new checkUsername;
	$user = $users->getUsername($username);
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
				$usern = $_POST['username'];
				$pass = $_POST['password'];
				$name = $_POST['nombre'];
				$last = $_POST['apellido'];
				$users = new checkUsername;
				$users->addUser($usern,$pass,$name,$last);
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
