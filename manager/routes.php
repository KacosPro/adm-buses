<?php

include('bd-access.php');

/**
 *
 */

class Routes {

	public function getSourceCities(){
		$sourceCities = array();
		$query = 'SELECT DISTINCT origen FROM rutas';
		$dbAccess = new DBAccess;
		$select = $dbAccess->select($query);
		return $select;
	}

	public function getDestinationCities() {
		$destinationCities = array();
		$query = 'SELECT DISTINCT destino FROM rutas';
		$dbAccess = new DBAccess;
		$select = $dbAccess->select($query);
		return $select;
	}
}


?>