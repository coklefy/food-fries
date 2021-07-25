<?php
include 'connection.php';
?>

<table>
<thead>
  <tr  style="background: #CC050C;">
    <th style= "color: white;">Email</th>
    <th  style= "color: white;">Nome</th>
    <th style= "color: white;">Cognome</th>
  </tr>
</thead>
<tbody>
  <?php
  // variables for server
  $servername = "localhost";
  $username = "root";
  $database = "foodfries";
  $password_server = "";


      $conn = new mysqli($servername, $username, $password_server, $database);
      if($conn->connect_errno){
        echo "Failed to connect to MySQL: (". $conn->connect_errno.") ";
      }

      $sql = "SELECT email, name, surname FROM cliente";
      $result = $conn->query($sql);
      if (mysqli_num_rows($result) > 0)	{
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr> <td aria-label='Email'>" . $row["email"] . "</td>";
              echo "<td aria-label='Nome'>" . $row["name"]. "</td>";
              echo "<td aria-label='Cognome'>" . $row["surname"] . "</td>";
              echo "</tr>";
          }
          echo "</tbody> </table>";
    }

      $conn->close();

?>
