<?php
	include('manager/users.php');

	$purchase = $_POST;

	$username = $_POST['username'];
	$password = $_POST['password'];
	$users = new Users;
	$user = $users->getUserInfo($username,$password);

		session_start();
		$_SESSION['normalSeats']=$purchase['normalSeats']; 
  		$_SESSION['discountSeats']=$purchase['discountSeats']; 

			$rows =$user->num_rows;
			if ($rows=='1'){
				while($row= $user->fetch_assoc()){					
					$_SESSION['usr']=$row['username'];
  					$_SESSION['pw']=$row['password'];
  					$_SESSION['loggedin']= true;
  					$_SESSION['wrongInfo']= false;
  					echo"<script type='text/javascript'>location.href ='buy.php';</script>";
				}
			}else{ 
				if (!empty($username)){
					$_SESSION['wrongInfo']= true;
				}
			}
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>NOPM | Autobuses de la Mayab</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/yeti/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Autobuses NOPM</a>
			</div>
	</nav>

<div class="container">
<form class="form" method="POST" action="login.php">
	<div class="form-group">
		<input type="email" class="form-control" placeholder="Email" name="username" required>
		<input type="password" class="form-control" placeholder="Password" name="password" required>
		<input type="hidden" name="source" value=<?php echo $purchase['source'] ?> >
		<input type="hidden" name="destination" value=<?php echo $purchase['destination'] ?> >
		<input type="hidden" name="hour" value=<?php echo $purchase['hour'] ?> >
		<input type="hidden" name="date" value=<?php echo $purchase['date'] ?> >
		<input type="hidden" name="normalSeats" value=<?php echo $purchase['normalSeats'] ?> >
		<input type="hidden" name="discountSeats" value=<?php echo $purchase['discountSeats'] ?> >
	</div>
	<input type="submit" class="btn btn-default" value="Login">
</form>
<br>
<form action="create-account.php">
<button type="submit" class="btn btn-default">Crear cuenta</button>
</form>
<br>
<br>
<form action="purchase.php">
<input type="submit" class="btn btn-default" value="Cancelar">
</form>
</div>
<?php if ($_SESSION['wrongInfo']== true):?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> Email o Password Incorrecto
		</div>
<?php endif;
	$_SESSION['wrongInfo']=false;
?>
</body>
</html>
