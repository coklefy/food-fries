<?php
	include '../database/connection.php';
	$data= array();
	$id_pietanza= $_POST['id_pietanza'];
//Here write your SQL query to get the data from your cards database
	$sql = "SELECT nome_pietanza FROM pietanza where id_pietanza=$id_pietanza";
	$result = $mysqli->query($sql);
	while ($row = $result->fetch_assoc()) {
		$data[] =$row;
	}
	echo json_encode($data);
	
?>