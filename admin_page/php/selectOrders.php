
<table>
<thead>
  <tr style="background: #CC050C;">
    <th style= "color: white;"> ID CLIENTE</th>
    <th style= "color: white;"> ID ORDINE</th>
    <th style= "color: white;"> ID PIETANZA</th>
    <th style= "color: white;"> ID RISTORANTE</th>
    <th style= "color: white;"> DATA </th>
    <th style= "color: white;"> ORA </th>
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

      $orderQuery = "SELECT id_cliente, id_ordine, id_pietanza, id_ristorante, data, ora FROM ordine";
      $result = $conn->query($orderQuery);

      if (mysqli_num_rows($result) > 0)	{
          while($row = mysqli_fetch_assoc($result)) {

            echo "<tr> <td aria-label='ID CLIENTE'>" . $row["id_cliente"] . "</td>";
            echo "<td aria-label='ID ORDINE'>" . $row["id_ordine"]. "</td>";
            echo "<td aria-label='ID PIETANZA'>" . $row["id_pietanza"] . " </td>";
            echo "<td aria-label='ID RISTORANTE'>" . $row["id_ristorante"] . "</td>";
            echo "<td aria-label=' DATA '>" . $row["data"].  "</td>";
            echo "<td aria-label=' ORA '>" . $row["ora"] . "</td>";

            echo "</tr>";

          }
          echo "<t/body> </table>";

      }

        $conn->close();

?>
