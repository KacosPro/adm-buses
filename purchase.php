<?php

$parameters = $_POST;

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
	<form class="form-horizontal">
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
				<p class="form-control-static"><?php echo $parameters['destination'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Hora:</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $parameters['hour'] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Fecha</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $parameters['date'] ?></p>
			</div>
		</div>
	</form>
</body>
</html>