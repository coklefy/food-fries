<?php
  include('../../registration/server.php');

      if(!isset($_SESSION))
      {
          session_start();
      }

      if(isset($_SESSION['user_id'])){
        $_SESSION = array();
        session_destroy();
        header("Location: ../../registration/login.php");
      }else {
        echo "no one is here";
      }
?>
