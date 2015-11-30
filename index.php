<?php

include('manager/routes.php');

$routes = new Routes;
$sourceCities = $routes->getSourceCities();
$destinationCities = $routes->getDestinationCities();

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADM | Autobuses de la Mayab</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Autobuses de la Mayab - ADM </title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/united/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/start/jquery-ui.min.css">
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
	<header>
		
	</header>
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
			</div>
			<div class="form-group">
				<label for="source">Fecha:</label>
				<input class="form-control input-sm" type="text" name="date" id="datepicker" required>
			</div>
			<input type="submit" class="btn btn-default">
		</form>
	</div>
	<div>
		
	</div>
</body>
</html>