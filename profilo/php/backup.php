<?php
  include('connection.php');
  $id_ordine = $_POST['id'];

  $query_sql = "SELECT  P.id_pietanza, P.nome_pietanza, O.quantita, O.prezzo  FROM ordine O, pietanza P WHERE O.id_pietanza = P.id_pietanza and id_ordine = '$id_ordine'";

  $resultS = $mysqli->query($query_sql);
  while ($row = $resultS->fetch_array()){
         $rows[] = $row;
  }
  echo json_encode($rows);
?>
