<?php

include('manager/bd-access.php');

$parameters = $_POST;

$dbAccess = new DBAccess;
$query = "";
$select = $dbAccess->select($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADM | Autobuses de la Mayab</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/united/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<form>
		<div class="form-group">
			<label class="col-sm-2 control-label">Origen</label>
			<div class="col-sm-10">
				<input type="hidden" name="source" value=<?php echo $parameters['source'] ?> >
				<p class="form-control-static"><?php echo $parameters['source'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Destino</label>
			<div class="col-sm-10">
				<input type="hidden" name="source" value=<?php echo $parameters['destination'] ?> >
				<p class="form-control-static"><?php echo $parameters['destination'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Hora:</label>
			<div class="col-sm-10">
				<input type="hidden" name="source" value=<?php echo $parameters['hour'] ?> >
				<p class="form-control-static"><?php echo $parameters['hour'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Fecha</label>
			<div class="col-sm-10">
				<input type="hidden" name="source" value=<?php echo $parameters['date'] ?> >
				<p class="form-control-static"><?php echo $parameters['date'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="source">Adultos:</label>
			<select class="form-control input-sm" name="source" id="source">
				<?php foreach ($sourceCities as $sourceCity): ?>
					<option value= <?php echo $sourceCity['origen']; ?> ><?php echo $sourceCity['origen']; ?></option>
				<?php endforeach; ?>
			</select>
			<label for="destination">Niños/Estudiantes/Tercera edad:</label>
			<select class="form-control input-sm" name="destination" id="destination">
				<?php foreach ($destinationCities as $destinationCity): ?>
					<option value= <?php echo $destinationCity['destino']; ?> ><?php echo $destinationCity['destino']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<input type="submit" class="btn btn-default" value="Comprar">
	</form>
</body>
</html>