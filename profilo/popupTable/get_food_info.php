<?php
  if(!isset($_SESSION)){
    session_start();
  }

    $id_ordine = $_SESSION['id_ordine'];

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

     $query_sql = "SELECT  P.id_pietanza, P.nome_pietanza, O.quantita, O.prezzo  FROM ordine O, pietanza P WHERE O.id_pietanza = P.id_pietanza and id_ordine = '$id_ordine'";

    $resultS = $mysqli->query($query_sql);

?>
