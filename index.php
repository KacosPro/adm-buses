<?php

include('manager/routes.php');

$routes = new Routes;
$sourceCities = $routes->getSourceCities();
$destinationCities = $routes->getDestinationCities();

session_start();
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
	<title>NOPM | Autobuses de la Mayab</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Autobuses de la Mayab - ADM </title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/yeti/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/vader/jquery-ui.min.css">
	<script>
		$(function() {
			$( "#datepicker" ).datepicker({
				minDate: 0,
				maxDate: "+1M +10D",
				numberOfMonths: 2,
				dateFormat: 'DD, d MM'
			});
		});
	</script>
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

	<div class="container">
	<div id="form-container">
		<form action="schedules.php" method="POST">
			<div class="form-group">
				<label for="source">De donde sales?</label>
				<select class="form-control input-sm" name="source" id="source">
					<?php foreach ($sourceCities as $sourceCity): ?>
						<option value= <?php echo $sourceCity['origen']; ?> ><?php echo $sourceCity['origen']; ?></option>
					<?php endforeach; ?>
				</select>
				<label for="destination">A donde vas?</label>
				<select class="form-control input-sm" name="destination" id="destination">
					<?php foreach ($destinationCities as $destinationCity): ?>
						<option value= <?php echo $destinationCity['destino']; ?> ><?php echo $destinationCity['destino']; ?></option>
					<?php endforeach; ?>
				</select>
				<label for="source">Fecha:</label>
				<input class="form-control input-sm" type="text" name="date" id="datepicker" required autocomplete="off">
			</div>
			<input type="submit" class="btn btn-default">
		</form>
	</div>
</div>
</body>
</html>