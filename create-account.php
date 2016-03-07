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
	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Autobuses NOPM</a>
        </div>
        </div>
    </nav>
    <div class="container">
    	<form class="form-horizontal" action='index.php' method="POST">
		
			<p>Datos del Usuario: </p>
				<div class="form-group">
					
					<div class="col-sm-10">
					<input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre" required>
					<input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Apellido" required>
					<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
					<input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
				</div>
		<div class="form-group">
			<div class="col-sm-10">
				<input type="submit" class="btn btn-default" value="Crear Cuenta">
			</div>
		</div>
		</form>
    </div>
</body>
</html>