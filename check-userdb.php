	<?php
	include('manager/check-username.php');
	$username = $_POST['username'];
	$users = new checkUsername;
	$user = $users->getUsername($username);
	retrieveUsernameDb($user);

	function retrieveUsernameDb($user) {
			session_start();
			$rows =$user->num_rows;
			if ($rows=='1'){
				while($row= $user->fetch_assoc()){					
					$_SESSION['usr']=$row['username'];
  					$_SESSION['repeatedInfo']= true;
  					echo"<script type='text/javascript'>location.href ='" . $_SERVER['HTTP_REFERER'] . "';</script>";
				}
			}else{
				$_SESSION['repeatedInfo']= false;
				echo"<script type='text/javascript'>location.href ='index.php';</script>";
			}
			
		}
	?>
