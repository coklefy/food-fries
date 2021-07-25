<?php
$servername = "localhost";
$username = "root";
$database = "foodfries";
$password_server = "";

$password = 12345;

    $conn = new mysqli($servername, $username, $password_server, $database);
    if($conn->connect_errno){
      echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
    }

  $image = $_GET['image'];
  $email = $_GET['email'];
  $nome = $_GET['nome'];
  $indirizzo = $_GET['indirizzo'];
  $civico = $_GET['civico'];
  $telefono = $_GET['telefono'];
  $piva = $_GET['piva'];


  // Attempt insert query execution
  $sql = "INSERT INTO ristorante (email, nome, indirizzo, civico, telefono,password, piva, image) VALUES ('$email','$nome','$indirizzo', '$civico','$telefono', '$password',  '$piva', '$image')";
  $conn->query($sql);
  // Close connection
  $conn->close();

header('Location: ../amministratore.php');
?>
