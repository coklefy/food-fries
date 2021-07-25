<?php

include('../../registration/server.php');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "foodfries");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$id_ristorante=$_SESSION['user_id'];
$nome_pietanza=mysqli_real_escape_string($link, $_REQUEST['nome_pietanza']);
$descrizione=mysqli_real_escape_string($link, $_REQUEST['descrizione']);
$prezzo=mysqli_real_escape_string($link, $_REQUEST['prezzo']);
$image=mysqli_real_escape_string($link, $_REQUEST['image']);
 
// Attempt insert query execution
$sql = "INSERT INTO pietanza (id_ristorante,nome_pietanza,descrizione, prezzo,image) VALUES ('$id_ristorante','$nome_pietanza','$descrizione', '$prezzo','$image')";
mysqli_query($link, $sql);
// Close connection
mysqli_close($link);
header('Location: ../ristorantiList.php#menu');
?>