<?php
    include('../registration/server.php');

    if(!isset($_SESSION))
    {
        session_start();
    }  // variables for server
  $servername = "localhost";
  $username = "root";
  $database = "foodfries";
  $password_server = "";


  $conn = new mysqli($servername, $username, $password_server, $database);
  if($conn->connect_errno){
    echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
  }
  $email = $_SESSION['user_id'];
  $query_sql = "SELECT  distinct id_ordine, id_ristorante  FROM ordine WHERE id_cliente = '$email'";
  $result = $conn->query($query_sql);

  $user_query = "SELECT * FROM cliente where email = '$email'";
  //  $user_result = $conn->query($query_sql);
  $statement = $conn->prepare($user_query);
  //$statement->bind_param('s', $_POST['email']);
  $statement->execute();
  $user_result = $statement->get_result();
  $user = $user_result->fetch_object();




?>
