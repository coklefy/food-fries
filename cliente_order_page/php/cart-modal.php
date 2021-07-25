	  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">				
  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">My Cart</h4>
	</div>
	<form action="php/checkout.php" method="post">
		<div class="modal-body my-scroll">
			<script type="text/javascript">
			  $(document).ready(ajustamodal);
			  $(window).resize(ajustamodal);
			  function ajustamodal() {
				var altezza = $(window).height()/2; //value corresponding to the modal heading + footer
				$(".my-scroll").css({"height":altezza,"overflow-y":"auto"});
			  }
			</script>
		  <!-- cart element -->
			<table id="show-cart">

			</table>
			<table id="total-cart"></table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-default" data_cliente="<?php echo $_SESSION['user_id']?>" id="clear_cart">Clear</button>
		 <button type="button"  class="btn btn-default" id="checkout" >Checkout</button>
		</div>
		
	</form>
  </div>
  
</div>
</div>
  