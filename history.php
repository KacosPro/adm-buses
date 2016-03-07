<?php 
	include('manager/bd-access.php');
	session_start();
	$auxID = $_SESSION['usr'];
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$selectQuery = ("SELECT id FROM usernames WHERE username = '$auxID';" );
	$idPoop = $mysqli->query($selectQuery)->fetch_array();
	$id = $idPoop['id'];
	$query = ("SELECT * FROM reservaciones WHERE user_id = $id");
	$results = $mysqli->query($query);
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
	<table class="table table-hover">
		<caption>Historial de compras</caption>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Origen</th>
				<th>Destino</th>
				<th>Fecha y Hora</th>
			</tr>
		</thead>
		<?php foreach ($results as $result): ?>
		<tbody>
			<tr>
				<td><?php print_r($result['nombre']); ?></td>
				<td><?php print_r($result['origen']); ?></td>
				<td><?php print_r($result['destino']); ?></td>
				<td><?php print_r($result['fecha_hora']); ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>
	<a href="index.php" role="button" class="btn btn-primary btn-lg">Inicio</a>
</body>
</html>