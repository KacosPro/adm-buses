<?php

session_start();
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

$totalRegulars = $purchase['normalSeats']*250;
$totalDiscount = $purchase['discountSeats']*125;

$names = $_POST;

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
	<form action="payment.php" method="POST">
		<div class="form-group">
			<label class="col-sm-2 control-label">Total regulares</label>
			<div class="col-sm-10">
				<input type="hidden" name="fullTotal" value=<?php echo $totalRegulars; ?> >
				<p class="form-control-static"><?php echo '$'.$totalRegulars; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Total descuento</label>
			<div class="col-sm-10">
				<input type="hidden" name="discountTotal" value=<?php echo $totalDiscount; ?> >
				<p class="form-control-static"><?php echo '$'.$totalDiscount; ?></p>
			</div>
		</div>
		<?php foreach ($names as $key => $parameter): ?>
			<input type="hidden" name=<?php echo $key ?> value=<?php echo $parameter; ?>>
		<?php endforeach; ?>
		<input type="submit" class="btn btn-default" value="PayPal">
		<input type="submit" class="btn btn-default" value="Tarjeta">
	</form>
</body>
</html>