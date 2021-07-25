<?php

include '../database/connection.php';

$id_ordine= $_POST['id_ordine'];
$id_pietanza= $_POST['id_pietanza'];
$id_cliente= $_POST['id_cliente'];
$id_ristorante= $_POST['id_ristorante'];
$prezzo=$_POST['prezzo'];
$quantita=$_POST['quantita'];
$data      =  date('Y-m-d');
$ora      =  date('H:i:s');
$address= $_POST['address'];
$number = $_POST['number'];
$city = $_POST['city'];
$cap =  $_POST['cap'];

echo $data;
echo $id_pietanza;
echo $id_cliente;
echo $id_ristorante;
echo $prezzo;
echo $quantita;
echo $ora;
echo $address;
echo $number;
echo $city;
echo $cap;


/*insert ordine*/

$sql = "INSERT INTO  ordine (id_ordine,id_cliente,id_pietanza,id_ristorante,data,ora,quantita,prezzo,via,civico,citta,cap) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('isiissidsisi',$id_ordine, $id_cliente,$id_pietanza,$id_ristorante,$data,$ora,$quantita,$prezzo,$address,$number,$city,$cap);
$stmt->execute();
$stmt->store_result();
$num_of_rows = $stmt->affected_rows;


/*insert notification*/

$testo="Ha effettuato un ordine";
$stato=0; /* se è 0 l'ordine non è stato ancora letto, se è 1 invece è stato letto */
$sql2= "INSERT INTO notifica (id_ordine,id_cliente,id_ristorante,testo,stato) VALUE (?,?,?,?,?)";
$stm = $mysqli->prepare($sql2);
$stm->bind_param('isisi', $id_ordine,$id_cliente,$id_ristorante,$testo,$stato);
$stm->execute();
$stm->store_result();


?>
