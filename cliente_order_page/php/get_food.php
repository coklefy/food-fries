<?php
	include 'database/connection.php';
//Here write your SQL query to get the data from your cards database
	$sql = "SELECT * FROM pietanza";
	$result = $mysqli->query($sql);
?>