	<html>
	<?php
	
	destroySession();

	function destroySession() {
		session_start();
		session_destroy();
		}
	?>

	<script type="text/javascript">location.href = 'index.php';</script>
	</html>