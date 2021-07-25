<?php
	// Credenziali per l'accesso al database
	$HOST="localhost"; // nome server.
	$USER="root"; // utente di accesso del db.
	$PASSWORD=""; // password di accesso al db.
	$DATABASE="foodfries"; // nome del db
	$mysqli = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
	// Connessione al db
	if($mysqli->connect_error) {
		die("Connection error: " . $mysqli->connect_error);
	}
?>