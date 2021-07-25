 <?php
  if(!isset($_POST['data'])){
      echo "NO DATA SETTTTTED";
  }else {?>
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
      <tbody>
        <?php
            //include 'get_food_info.php';
            $id_ordine = $_SESSION['value'];
            echo $id_ordine;
          // Credenziali per l'accesso al database
             $HOST="localhost"; // nome server.
             $USER="root"; // utente di accesso del db.
             $PASSWORD=""; // password di accesso al db.
             $DATABASE="foodfries"; // nome del db
             $mysqli = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
          // Connessione al db
            if($mysqli->connect_error) {
               die("Connection error: " . $mysqli->connect_error);
            }

             $query_sql = "SELECT  P.id_pietanza, P.nome_pietanza, O.quantita, O.prezzo  FROM ordine O, pietanza P WHERE O.id_pietanza = P.id_pietanza and id_ordine = '$id_ordine'";

            $resultS = $mysqli->query($query_sql);
            if($resultS->num_rows > 0){
                while($rowS = $resultS->fetch_assoc()){
                  echo "<tr><td aria-label='ID'>" . $rowS['id_pietanza'] ."</td>";
                  echo "<td aria-label='FOOD'>" . $rowS['nome_pietanza'] ."</td>";
                  echo "<td aria-label='QUANTITY'>" . $rowS['quantita'] ."</td>";
                  echo "<td aria-label='PRICE'>" . $rowS['prezzo'] ."</td>";
                  echo "</tr>";
                }
                echo "</tbody> </table>";
              }else {
              } 
          ?>
      </div>
    </div>


<!-- script js che funziona NON TOOOCCCAAAARREE -->
<script>
    var modal   = document.getElementById('modal');
    var btn     = document.getElementById('quickViewTrigger');
    var span    = document.getElementsByClassName('close')[0];
    var btn_val = document.getElementById('quickViewTrigger').value;
    var btn_val = document.getElementById('quickViewTrigger').value;

  /*  btn.onclick = function() {
      modal.style.display = "block";
      $(document).ready(function () {
        createCookie('btn_val', btn_val, "10");
      });

    } */

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
        }
      }
</script>
<?php } ?>
