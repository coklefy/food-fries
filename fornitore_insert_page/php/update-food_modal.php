<!-- Modal insert food -->
  <div class="modal fade" id="modal-update-<?=$row['id_pietanza']?>" role="dialog">
	<div class="modal-dialog">				
	  <!-- Modal content-->
	 
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"></h4>
		</div>
		<form action="php/update-food.php" method="post">
			<div class="modal-body  my-scroll">
			<script type="text/javascript">
			  $(document).ready(ajustamodal);
			  $(window).resize(ajustamodal);
			  function ajustamodal() {
				var altezza = $(window).height()/2; //value corresponding to the modal heading + footer
				$(".my-scroll").css({"height":altezza,"overflow-y":"auto"});
			  }
			</script>
			<input type="hidden" name="id_pietanza" value="<?= $row['id_pietanza'] ?>">
					<div class="form-group">
						<label>Upload Image</label>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse… <input type="file" id="imgInp" >
								</span>
							</span>
							<input type="text" name="image" class="form-control" value="<?=$row['image']?>" readonly>
						</div>
						<img id='img-upload'/>
					</div>


				  <div class="form-group">
					<label for="pietanza">Food name</label>
					<input type="text" name="nome_pietanza" class="form-control" id="pietanza" value="<?=$row['nome_pietanza']?>" required>
				  </div>
				  
				  <div class="form-group">
					<label for="desc">Description</label>
					<textarea name="descrizione" class="form-control" id="desc"  required><?=$row['descrizione']?> </textarea> 
				  </div>
				  <div class="form-group">
					<label for="prezzo">Price</label>
					<input type="number" name="prezzo" class="form-control" id="prezzo" value="<?=$row['prezzo']?>" required>
				  </div>		
			</div>
			
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			   <input type="submit" value="Insert Product"  class="btn btn-default">
			</div>
		</form>	  
	  </div>
	  
	</div>
  </div>