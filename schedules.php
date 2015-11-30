<?php

include('manager/bd-access.php');

$access = new DBAccess;

session_start();

$post = $_POST;
if (!isset($_SESSION['source'])){
	$_SESSION['source']=$post['source'];
	$_SESSION['destination']=$post['destination'];
	$_SESSION['date']= $post['date'];
}else{
	if (isset($post['source'])){
		$_SESSION['source']=$post['source'];
		$_SESSION['destination']=$post['destination'];
		$_SESSION['date']= $post['date'];
	}
}

$source = $_SESSION['source'];
$destination = $_SESSION['destination'];
$date = $_SESSION['date'];

if(date('w', strtotime($date)) == 6 || date('w', strtotime($date)) == 0)  {
	$query = "SELECT * FROM rutas where origen = '$source' and destino = '$destination' and weekend = 1";
} else {
	$query = "SELECT * FROM rutas where origen = '$source' and destino = '$destination' and weekday = 1";
}

$results = $access->select($query);
$date = new DateTime;
$date = $date->format('Y-m-d');

if(isset($_SESSION['loggedin'])){
	$login = true;
}else{
	$login = false;
}
if($_SESSION['wrongInfo']==true){
	$wrongInfo = true;
}else{
	$wrongInfo = false;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADM | Autobuses de la Mayab</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<?php if ($login): ?>
				<ul class= "nav navbar-nav navbar-right">
					<li>
						<a> Se encuentra en una sesion </a>
					</li>
					<li>
						<form class="navbar-form navbar-left" method="POST" action="destroySession.php">
						</li>
					</ul>
					<button type="submit" class="btn btn-default">Cerrar Sesion</button>
				</form>
				 <button type="button" disabled class="btn btn-default">Mostrar Historial</button>
			<?php else:?>
				<form class="navbar-form navbar-left" method="POST" action="checkOnDB.php">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" name="username" required>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<button type="submit" class="btn btn-default">Login</button>
				</form>
			<?php endif; ?>
		</div>
	</nav>
	<?php if ($wrongInfo):?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> Email o Password Incorrecto
		</div>
	<?php endif;
	$_SESSION['wrongInfo']=false;
	?>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>
					<p>Ruta</p>
				</td>
				<td>
					<p>Hora</p>
				</td>
				<td></td>
			</tr>
		</thead>
		<tbody class="table table-hover">
			<?php foreach ($results as $result): ?>
				<tr>
					<td><p><?php echo $result['origen'].' a '.$result['destino']; ?></p></td>
					<td><p><?php echo $result['horario']; ?></p></td>
					<td>
						<form action="purchase.php" method="POST">
							<div class="form-group">
								<input type="hidden" name="source" value=<?php echo $result['origen']; ?> >
								<input type="hidden" name="destination" value=<?php echo $result['destino']; ?> >
								<input type="hidden" name="hour" value=<?php echo $result['horario']; ?> >
								<input type="hidden" name="date" value=<?php echo $date; ?> >
								<input type="submit" class="btn btn-default" value="Seleccionar">
							</div>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>
