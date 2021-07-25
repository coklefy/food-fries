<?php

    if(!isset($_SESSION))
    {
        session_start();
    }
// variables for server
$servername = "localhost";
$username = "root";
$database = "foodfries";
$password_server = "";

// LOGIN USER
if ( isset( $_POST['log_in'] )) {
    if( isset($_POST['email']) && isset( $_POST['password']) ){

      // Create connection with database. Check if everything is ok
      $conn = new mysqli($servername, $username, $password_server, $database);
      if($conn->connect_errno){
        echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
      }


      $str = $_POST['email'];

      if(!ctype_digit($str)){
            // Query to be executed. ( Get all the emails of registered users on database)
            $query_sql = "SELECT * FROM cliente WHERE email = ?";
            // Prepare query
            $statement = $conn->prepare($query_sql);
            $statement->bind_param('s', $_POST['email']);
            $statement->execute();
            $result = $statement->get_result();
            $user = $result->fetch_object();
            // Close the connection with database
            $conn->close();
            // Verify user password and set $_SESSION
	           if($user !== null){
		             if( $_POST['password'] === $user->password  ){
			                $_SESSION['user_id'] = $user->email;
			                header("location: ../foodfries/foodfries/home.php");
	               } else {
                   header("location: login.php");
                 }
            }else if($_POST['email'] == "admin@gmail.com"){
                $_SESSION['user_id'] ="admin@gmail.com";
                header("location: ../admin_page/amministratore.php");
            }else {
              header("location: login.php");
            }
     }else if(ctype_digit($str)){
            $query_sql = "SELECT * FROM ristorante WHERE piva = ?";
            // Prepare query
            $statement = $conn->prepare($query_sql);
            $statement->bind_param('s', $_POST['email']);

            $statement->execute();
            $result = $statement->get_result();
            $user = $result->fetch_object();
            // Close the connection with database
            $conn->close();
            // Verify user password and set $_SESSION
            if($user !== null){
                if( $_POST['password'] === $user->password  ){
                    $_SESSION['user_id'] = $user->piva;
                    header("location: ../fornitore_insert_page/ristorantiList.php");
                }else {
                  header("location: login.php");
                }
            }else {
              header("location: login.php");
            }
     }
	}
}


// REGISTER USER
if ( isset( $_POST['register_user'] )) {
    if( isset($_POST['email']) && isset( $_POST['password']) && isset($_POST['name']) && isset($_POST['surname'])){
      // Create connection with database. Check if everything is ok
      $conn = new mysqli($servername, $username, $password_server, $database);
      if($conn->connect_errno){
        echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
      }

      $query_sql = "INSERT INTO `cliente`(`name`, `surname`, `email`, `password`) VALUES ('".$_POST['name']."', '"
                                                                                         .$_POST['surname']."', '"
                                                                                         .$_POST['email']."', '"
                                                                                         .$_POST['password']."')";
      // Create connection with database. Check if everything is ok
      $conn = new mysqli($servername, $username, $password_server, $database);
      if($conn->connect_errno){
        echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
      }
      //Invio query
      if ($conn->query($query_sql) === TRUE) {
          header("Location:../foodfries/foodfries/home.php");
      } else {
          header("Location:register.php");
      }
      //Chiusura connessione con db
      $conn->close();
    }
}
/*
function debugToConsole($msg) {
        echo "<script>console.log(".json_encode($msg).")</script>";
}
*/

?>
