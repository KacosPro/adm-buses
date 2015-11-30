<?php

include('manager/bd-access.php');

$access = new DBAccess;

$post = $_POST;
$source = $post['source'];
$destination = $post['destination'];
$date = $post['date'];
if(date('w', strtotime($date)) == 6 || date('w', strtotime($date)) == 0)  {
	$query = "SELECT * FROM rutas where origen = '$source' and destino = '$destination' and weekend = 1";
} else {
	$query = "SELECT * FROM rutas where origen = '$source' and destino = '$destination' and weekday = 1";
}
$results = $access->select($query);
$date = new DateTime;
$date = $date->format('d-m-y');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/united/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>
					<p>Ruta</p>
				</td>
				<td>
					<p>Hora</p>
				</td>
				<td>
					<p>Seleccionar</p>
				</td>
			</tr>
		</thead>
		<tbody class="table table-hover">
			<?php foreach ($results as $result): ?>
				<tr>
					<td><p><?php echo $result['origen'].' a '.$result['destino']; ?></p></td>
					<td><p><?php echo $result['horario']; ?></p></td>
					<td>
						<form>
							<div class="form-group">
								<button type="submit" class="btn btn-default">Comprar</button>
							</form>
							<!--<a href=<?php echo 'purchase.php?source='.$result['origen'].'&destination='.$result['destino'].'&hour='.$result['horario'].'&date='.$date; ?>><p>comprar</p></a>-->
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
	</html>