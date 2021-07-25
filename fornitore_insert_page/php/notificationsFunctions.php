<?php
	function getNumNotifications(){	
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			include 'database/connection.php';		
			$sql = "SELECT * from notifica where (id_ristorante = '" . $_SESSION['user_id'] ."' AND stato= '0') GROUP BY id_ordine";
			$result = $mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
	function updateStateNotifications() {
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

			include '../database/connection.php';
			$sql = 'UPDATE notifica SET Stato="1" WHERE Stato="0"';				 
			$result = $mysqli->query($sql);
		}
	}
?>
