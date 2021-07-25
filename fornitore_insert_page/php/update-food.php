<?php 

include '../database/connection.php';

if ($_POST) {
	$id_pietanza      = (int) $_POST['id_pietanza'];
	$id_ristorante= $_SESSION['user_id'];
	$nome_pietanza      = trim ($_POST['nome_pietanza']);
	$descrizione      = trim ($_POST['descrizione']);
	$prezzo      = 		 $_POST['prezzo'];
	$image      =  $_POST['image'];

	
	$sql = "UPDATE pietanza
				SET  nome_pietanza = ?, descrizione = ?, prezzo= ?,image = ?
			WHERE id_pietanza = ?";				
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('ssdsi', $nome_pietanza,$descrizione,$prezzo,$image,$id_pietanza);
	$stmt->execute();
	$stmt->store_result();
	$num_of_rows = $stmt->affected_rows;
	if ($num_of_rows > 0) {
		header("Location: ../ristorantiList.php?id_pietanza=".$id_pietanza."&status=updated");
		exit();
	}else{
		header("Location: ../ristorantiList.php?id_pietanza=".$id_pietanza."&status=fail_update");
		exit();
	}
}else{
		header("Location: ../ristorantiList.php?id_pietanza=".$id_pietanza."&status=fail_update");
		exit();
}
						
?>