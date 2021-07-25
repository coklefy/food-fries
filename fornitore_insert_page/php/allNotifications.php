<!-- Modal -->
<div id="allNotification" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Notification</h4>
      </div>
      <div class="modal-body my-scroll">
        <script type="text/javascript">
          $(document).ready(ajustamodal);
          $(window).resize(ajustamodal);
          function ajustamodal() {
            var altezza = $(window).height()/2; //value corresponding to the modal heading + footer
            $(".my-scroll").css({"height":altezza,"overflow-y":"auto"});
          }
        </script>

        <?php  
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

          include 'database/connection.php';
          $sql = "SELECT id_ordine, id_cliente, testo, orario FROM notifica WHERE (id_ristorante = '" . $_SESSION['user_id'] ."') ORDER BY `orario` DESC";

          $result = $mysqli->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

              $mittente = $row['id_cliente'];

              $sql = "SELECT * from cliente WHERE (email='". $mittente ."')";

              $mitresult = $mysqli->query($sql);
              if($mitresult->num_rows >0) {
                $mitrow = $mitresult->fetch_assoc();
                echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
                echo '<div class="d-flex w-100 justify-content-between">';
                echo '<h4 class="mb-1">' . $mitrow['name'] . " " . $mitrow['surname'] . "</h4>";
                echo '</div>';
                echo '<p class="mb-1">' . $row['testo'] . '</p>';
                echo '<small>' . $row['orario'] . '</small></a>';
              }
              
            }
          } else {

            echo '<p id="no_notifications">there are no notifications.</p>';
          }
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
      </div>
    </div>

  </div>
</div>