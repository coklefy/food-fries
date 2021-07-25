<?php

include '../database/connection.php';


if (isset($_GET['id_pietanza'])) {
	
	$id_pietanza =$_GET['id_pietanza']; 
	$sql = "DELETE FROM `pietanza` WHERE `pietanza`.`id_pietanza`= ? "; //add single quotes around variable $productid to seperate string from query
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i',$id_pietanza);
	$stmt->execute();
	$stmt->store_result();
	$num_of_rows = $stmt->affected_rows;
	if ($num_of_rows > 0) {
		header("Location: ../ristorantiList.php?status=deleted");
		exit();
	}else{
		header("Location: ../ristorantiList.php?status=fail_deleted");
		exit();
	}
}else{
		header("Location: ../ristorantiList.php?status=fail_deleted");
		exit();	
}
?>