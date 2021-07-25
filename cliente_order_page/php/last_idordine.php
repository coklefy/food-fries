<?php

	include '../database/connection.php';
	
		$sql_ordine = "SELECT MAX(id_ordine) as id_ordine FROM `ordine` LIMIT 1";
		$result = $mysqli->query($sql_ordine);
		if($result->num_rows < 1){
		  $id_ordine = 1;
		  echo $id_ordine;
		}else {
		  $row = mysqli_fetch_assoc($result);
		  $id_ordine = $row['id_ordine'] +1;
		  echo $id_ordine;
		}

?>