
<table>
<thead>
  <tr style="background: #CC050C;">
    <th style= "color: white;" >Email</th>
    <th style= "color: white;">Indirizzo</th>
    <th style= "color: white;">Nome</th>
    <th style= "color: white;">P. Iva</th>
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

      $sql = "SELECT email, indirizzo, nome, piva FROM ristorante";
      $result = $conn->query($sql);

      if (mysqli_num_rows($result) > 0)	{

          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr> <td aria-label='Email'>" . $row["email"] . "</td>";
              echo "<td aria-label='Indirizzo'>" . $row["indirizzo"]. "</td>";
              echo "<td aria-label='Nome'>" . $row["nome"] . " </td>";
              echo "<td aria-label='P. Iva'>" . $row["piva"]. "</td>";
              echo "</tr>";
          }
          echo "<t/body> </table>";
    }


      $conn->close();

?>
