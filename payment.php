<?php
$post = $_POST;
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
	<form action="sale.php" method="POST">
		<?php foreach ($post as $key => $parameter): ?>
			<input type="hidden" name=<?php echo $key ?> value=<?php echo $parameter; ?>>
		<?php endforeach; ?>
		<input type="submit" id="button" hidden>
	</form>
	<div class="jumbotron"  style="text-align: center">
	<h1>Validando</h1>
		<p id="status"></p>
	</div>
	<script>
		window.onload = function() {
			setTimeout(function(){
				var rand = Math.floor((Math.random() * 100) + 0);
				console.log(rand);
				if (rand > 2) {
					document.getElementById("status").innerHTML = "Aceptada!";
					document.getElementById("button").click();
				}else{
					document.getElementById("status").innerHTML = "Rechazada";
				};
			}  , 3000 );
		};
	</script>
</body>
</html>