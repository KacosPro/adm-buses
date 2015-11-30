<?php

$purchase = $_POST;
$ticketsNumber = $_POST['normalSeats']+$_POST['discountSeats'];

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
	<p>Ingrese los nombres de los usuarios</p>
	<form class="form-horizontal" action='confirm.php' method="POST">
		<?php for ($i=0; $i < $ticketsNumber; $i++): ?>
			<div class="form-group">
				<label for=<?php echo 'name'.$i+1; ?> class="col-sm-2 control-label">Nombre: </label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name=<?php echo 'name'.$i+1; ?> id=<?php echo 'name'.$i+1; ?> placeholder="Nombre" required>
				</div>
			</div>
		<?php endfor; ?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-default" value="Comprar">
			</div>
		</div>
	</form>
</body>
</html>