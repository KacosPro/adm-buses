<?php

include('manager/bd-access.php');

session_start();

$post= $_POST;

if (!isset($_SESSION['source'])){
	$_SESSION['hour']=$post['hour'];
}else{
	if (isset($post['hour'])){
		$_SESSION['hour']=$post['hour'];
	}
}

$source = $_SESSION['source'];
$destination = $_SESSION['destination'];
$hour = $_SESSION['hour'];
$date = new DateTime($_SESSION['date']);
$date = $date->format('y-m-d');

$db = Database::getInstance();
$mysqli = $db->getConnection();
$fechaHora = $date.' '.$hour;
$query = "SELECT * FROM reservaciones WHERE origen='$source' and destino='$destination' and fecha_hora='$fechaHora'";
$results = $mysqli->query($query);

$seats = $results->num_rows;

if ($seats < 21) {
	$seatsLeft = 20 - $seats;
}else{
	$seatsLeft = 0;
}

$parameters = array($source,$destination,$hour,$date);
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
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
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
         <a href="history.php" role="button" class="btn btn-default">Mostrar Historial</a>
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
    if ($login) {
    	$url = 'buy.php';
    }else{
    	$url = 'login.php';
    }
  ?>
  	<div class="alert alert-danger" id="emptySeats" hidden>
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> Elija un asiento
	</div>
	<div class="alert alert-danger" id="seatsValidator" hidden>
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> No hay suficientes asientos
	</div>
  <div class="container">
	<form action=<?php echo $url; ?> method="POST">
		<div class="form-group">
			<label class="col-sm-2 control-label">Origen</label>
			<div class="col-sm-10">
				<input type="hidden" name="source" value=<?php echo $parameters[0] ?> >
				<p class="form-control-static"><?php echo $parameters[0] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Destino</label>
			<div class="col-sm-10">
				<input type="hidden" name="destination" value=<?php echo $parameters[1] ?> >
				<p class="form-control-static"><?php echo $parameters[1] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Hora:</label>
			<div class="col-sm-10">
				<input type="hidden" name="hour" value=<?php echo $parameters[2] ?> >
				<p class="form-control-static"><?php echo $parameters[2] ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Fecha</label>
			<div class="col-sm-10">
				<input type="hidden" name="date" value=<?php echo $parameters[3] ?> >
				<p class="form-control-static"><?php echo $parameters[3] ?></p>
			</div>
		</div>
		<div class="form-group">
			<p>Asientos restantes: <p id="seatsLeft"><?php echo $seatsLeft; ?></p></p>
			<label for="source">Adultos:</label>
			<select class="form-control input-sm" name="normalSeats" id="source">
				<?php for ($i = 0; $i < $seatsLeft+1; $i++): ?>
					<option value= <?php echo $i; ?> ><?php echo $i; ?></option>
				<?php endfor; ?>
			</select>
			<label for="destination">Niños/Estudiantes/Tercera edad:</label>
			<select class="form-control input-sm" name="discountSeats" id="destination">
				<?php for ($i = 0; $i < $seatsLeft+1; $i++): ?>
					<option value= <?php echo $i; ?> ><?php echo $i; ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<input type="submit" id="buy" hidden>
	</form>
	<input id="go" type="submit" class="btn btn-default" value="Comprar" hidden>
	<br>
	<br>
	<form action="schedules.php">
	<input type="submit" class="btn btn-default" value="Cancelar">
	</form>
	<script>
		$('#go').click(function(){
			var source = $( '#source option:selected' ).val();
			var destination = $( '#destination option:selected' ).val();
			var total = parseInt(source) + parseInt(destination);
			var seatsLeft = $( '#seatsLeft' ).text();
			console.log(total + ' - ' + seatsLeft);
			if (source == 0 && destination == 0) {
				$('#emptySeats').show();
			}else if (total > parseInt(seatsLeft)) {
				$('#seatsValidator').show();
			}else{
				console.log('Todo bien');
				$('#buy').click();
			};
		});
	</script>
</div>
</body>
</html>