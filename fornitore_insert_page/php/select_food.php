<?php
	include 'database/connection.php';
	include '../registration/server.php';
	$id_ristorante= $_SESSION['user_id'];
//Here write your SQL query to get the data from your cards database
	$sql = "SELECT * FROM pietanza where id_ristorante= $id_ristorante";  //id_ristorante a 1 per test da prendere dalla sessione
	$result = $mysqli->query($sql);
?>
