<?php

include('manager/bd-access.php');

session_start();

$auxID = $_SESSION['usr'];

$db = Database::getInstance();
$mysqli = $db->getConnection();
$selectQuery = ("SELECT id FROM usernames WHERE username = '$auxID';" );
$idPoop = $mysqli->query($selectQuery)->fetch_array();
$id = $idPoop['id'];
$source = $_SESSION['source'];
$destination = $_SESSION['destination'];
$hour = $_SESSION['hour'];
$date = new DateTime($_SESSION['date']);
$date = $date->format('y-m-d');

$purchase = array(
	"source" => $_SESSION['source'],
	"destination" => $_SESSION['destination'],
	"hour" => $_SESSION['hour'],
	"date" => $date,
	"normalSeats" => $_SESSION['normalSeats'],
	"discountSeats" => $_SESSION['discountSeats'],
);

$parameters = array($source,$destination,$hour,$date);

?>
<!DOCTYPE html> 
<html>
<head>
	<title>NOPM | Autobuses de la Mayab</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/yeti/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<form>
		<?php foreach ($_POST as $key => $post): ?>
			<?php $aux = $key;?>
			<?php if (strpos($aux, 'half') !== false || strpos($aux, 'regular') !== false): ?>
				<div class="container">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?php echo $_POST[$key] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Origen</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?php echo $parameters[0] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Destino</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?php echo $parameters[1] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Hora:</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?php echo $parameters[2] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Fecha</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?php echo $parameters[3] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Precio</label>
						<div class="col-sm-10">
						<?php if (strpos($aux, 'half') !== false): ?>
							<p class="form-control-static"><?php echo '$125'?></p>
						<?php else: ?>
							<p class="form-control-static"><?php echo '$250'?></p>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<p>----------------------------------------------------------------------------------------</p>
				<br><br>
				<?php
					$key = $_POST[$key];
					$datetime = $parameters[3].' '.$parameters[2];
					$query = "INSERT INTO reservaciones (nombre, user_id, origen, destino, fecha_hora) VALUES ('$key', $id, '$source', '$destination', '$datetime');";
					$mysqli->query($query);
				?>
			<?php endif; ?>
		<?php endforeach; ?>
		<input type="submit" class="btn btn-default" value="Imprimir">
	</form>
	<br>
	<form action="index.php">
	<input type="submit" class="btn btn-default" value="Regresar a la pagina de inicio">
	</form>
	</div>
</body>
</html>