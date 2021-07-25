<?php


include('../../registration/server.php');

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	
	include '../database/connection.php';
	$stato=0;
	$id_ristorante= $_SESSION['user_id'];
	$sql="SELECT * from notifica where (id_ristorante= '" .$_SESSION['user_id'] ."' AND stato= '0') GROUP BY id_ordine ORDER BY `orario` DESC";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_cliente=$row['id_cliente'];
			
			$sql="SELECT * from cliente WHERE (email= '". $id_cliente ."')";
			$cliente_result= $mysqli->query($sql);
			if($cliente_result->num_rows == 1){
				$clientRow = $cliente_result->fetch_assoc();
				echo '<li><p class="dropdown-item"><b>' . $clientRow['name'] . " " . $clientRow['surname'] . ":</b> ";
				
			}
			echo $row['testo'] . '</br>' ;
			echo  $row['orario'] . '</p></li>';

		}	
	
	}else {
					
			echo '<p class="dropdown-item">Nessuna nuova notifica</p>';
		}		
	
	include 'notificationsFunctions.php';
	updateStateNotifications();
}





?>