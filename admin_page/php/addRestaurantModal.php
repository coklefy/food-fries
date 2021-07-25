
<button type="button" class="button" data-toggle="modal" data-target="#myModal">
  <span>Add a Restaurant</span>
</button>

  <div class="modal fade" role="dialog" id="myModal">
	<div class="modal-dialog">
	  <!-- Modal content-->
  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"></h4>
		</div>
		<form action='php/addRestaurant.php' method="get">
			<div class="modal-body">

					<div class="form-group">
						<label>Upload Image</label>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" name="image" id="imgInp" required >
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
						<img id='img-upload'/>
					</div>


          <div class="form-group">
					<label for="email">email</label>
					<input type="text" name="email" class="form-control" id="email" required>
				  </div>

				  <div class="form-group">
					<label for="restaurant"> Restaurant name</label>
					<input type="text" name="nome" class="form-control" id="restaurant" required>
				  </div>

				  <div class="form-group">
					<label for="address"> Address</label>
					<input type= "text" name="indirizzo" class="form-control" id="address" required>
				  </div>

				  <div class="form-group">
					<label for="indirizzo">Address Number</label>
					<input type="number" name="civico" class="form-control" id="civico" required>
				  </div>

          <div class="form-group">
					<label for="telefono">Phone Number</label>
					<input type="number" name="telefono" class="form-control" id="telefono" required>
				  </div>

          <div class="form-group">
					<label for="piva">P. Iva </label>
					<input type="number" name="piva" class="form-control" id="piva" required>
				  </div>

			</div>

			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
			   <input type="submit" value="Insert Restaurant"  class="btn btn-default">
			</div>
		</form>
	  </div>

	</div>
  </div>
