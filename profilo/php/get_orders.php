<?php
  include 'connection.php';
  include 'uploadProfile.php';

?>

  <table>
	<thead>
		<tr>
			<th>Order ID</th>
      <th>Restaurant</th>
      <th>Price</th>
      <th>Date/Time</th>
      <th>Delivery address</th>
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


        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            /* codice per poter prendere il nome della pietanza avendo già il codice pietanza
            $id_pietanza = $row["id_pietanza"];
            $query_pietanza = "SELECT nome_pietanza FROM pietanza WHERE id_pietanza = '$id_pietanza'";
            $resP = $conn->query($query_pietanza);
            if ($resP->num_rows > 0) {
              // output data of each row
              while($rowP = $resP->fetch_assoc()) {
                $nome_pietanza = $rowP['nome_pietanza'];
                $row["id_pietanza"] = $nome_pietanza;
              }
            } else {
              //echo "0 results";
            }
            */
            $id_ristorante = $row['id_ristorante'];
            $query_ristorante = "SELECT nome FROM ristorante WHERE piva = '$id_ristorante'";
            $resR = $conn->query($query_ristorante);
            if ($resR->num_rows > 0) {
              // output data of each row
              while($rowR = $resR->fetch_assoc()) {
                $nome_ristorante = $rowR['nome'];
                $row["id_ristorante"] = $nome_ristorante;
              }
            } else {
              //echo "0 results";
            }

            /* codice per poter prendere il costo totale di un ordine */
            $id_order = $row["id_ordine"];
            $query_order = "SELECT sum(quantita*prezzo) as costo , data, ora, via, citta, civico, cap FROM ordine WHERE id_ordine = '$id_order'";
            $resO = $conn->query($query_order);
            if ($resO->num_rows > 0) {
              // output data of each row
              while($rowO = $resO->fetch_assoc()) {
                $costo = $rowO['costo'];
                $row["prezzo"] =  $costo;
                $row["ora"] = $rowO['ora'] . " / " . $rowO['data'] ;
                $row["via"] = $rowO['via'] . " " . $rowO['civico'] . " , " . $rowO['citta'] . " ( " . $rowO['cap'] . ")";
              }
            } else {
              //echo "0 results";
            }

            echo "<tr><td aria-label='Order'> <button class='wowButton' id='quickViewTrigger' data-ordine-id='" .$row['id_ordine']."' onclick=clickMe(".$row['id_ordine'].")> <input type='hidden' id='".$row['id_ordine']."' name='idO' value='".$row["id_ordine"]."'>" . $row["id_ordine"] ."</button>";
            echo "</td>";
            echo "<td aria-label='Restaurant'>" . $row["id_ristorante"] . "</td>";
            echo "<td aria-label='Price'>" . $row["prezzo"] . "</td>";
            echo "<td aria-label='Date/Time'>" . $row["ora"] . "</td>";
            echo "<td aria-label='Address'>" . $row["via"] . "</td>";
            echo "</tr>";
          }
        }else {
          $conn->close();
        }
        echo "</table>";
      //  include '../profilo/popupTable/popupTable.php';
    ?>
    <div class="modal" id="modal">
      <div id="modal-content">
        <span class="close">&times</span>
        <table id="myTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Food</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody id="body">
          </tbody>
        </table>

<script>
var modal   = document.getElementById('modal');
var btn     = document.getElementById('quickViewTrigger');
var span    = document.getElementsByClassName('close')[0];
var btn_val = document.getElementById('quickViewTrigger').value;
var btn_val = document.getElementById('quickViewTrigger').value;

function clickMe(value) {
  $.post('php/backup.php' , {id:value}, function(data){
    modal.style.display = "block";
    var jsonObj = JSON.parse(data);
    for (var i = 0; i < jsonObj.length; i++) {
        var obj = jsonObj[i];
        document.getElementById('body').innerHTML += "<tr><td aria-label='ID'>"+obj.id_pietanza+"</td><td aria-label='FOOD'>"+obj.nome_pietanza+"</td><td aria-label='QUANTITY'>"+obj.quantita+"</td><td aria-label='PRICE'>"+obj.prezzo+"</td></tr>";

        console.log(obj.prezzo);
    }
    console.log(data);

    //  console.log(data);


   });
}

span.onclick = function() {
  modal.style.display = "none";

  document.getElementById('body').innerHTML = "";
}

window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
