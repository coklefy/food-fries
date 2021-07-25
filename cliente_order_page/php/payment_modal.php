  <!-- Modal -->
  <div class="modal fade" id="payment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="title">Checkout</h3>
        </div>
        <div class="modal-body  my-scroll">
		<script type="text/javascript">
          $(document).ready(ajustamodal);
          $(window).resize(ajustamodal);
          function ajustamodal() {
            var altezza = $(window).height()/2; //value corresponding to the modal heading + footer
            $(".my-scroll").css({"height":altezza,"overflow-y":"auto"});
          }
        </script>
		<form>
			<table class="products" id="produt">
				
				<!-- cart detail here -->
				
			</table>
			<table id="total"> <!-- cart total here --> </table>
			 <input type="hidden" id="id_ordine"/>
				 <div class="shipping-data">
					<div class="row">
					  <div class="form-group col-sm-8">
					  <label for="Delivery_address">Delivery address</label>
						<input id="Delivery_address" type="text" class="form-control" placeholder="Delivery address" aria-label="Delivery address" aria-describedby="basic-addon1" required>
					  </div>

					  <div class="form-group col-sm-8">
					  <label for="house-number">House number</label>
						<input id="house_number" type="text" class="form-control" placeholder="House number" aria-label="House number" aria-describedby="basic-addon1" required>
					  </div>
						
					  <div class="form-group col-sm-8">
					  <label for="city">city</label>
						<input id="city" type="text" class="form-control" placeholder="city" aria-label="city" aria-describedby="basic-addon1" required>
					  </div>
						
					<div class="form-group col-sm-8">
					  <label for="cap">Cap</label>
						<input id="cap" type="text" class="form-control" placeholder="cap" aria-label="cap" aria-describedby="basic-addon1" required>
					  </div>
					  
					</div>
				  </div>
			 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default annulla" data-dismiss="modal" >Close</button>
				<input type="button" class="btn btn-primary" value="Prooceed" id="proceed">
			</div>
	</form>
      </div>
      
    </div>
  </div>