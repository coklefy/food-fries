<?php
 
	include 'database/connection.php';

	$sql = "SELECT * FROM ristorante";
	$result = $mysqli->query($sql);

?>