<?php
	if(!empty($resultato) && $resultato->num_rows > 0){
		while($riga = $resultato->fetch_assoc()){
			?>
 <section class="tv-paddingT100 tv-bgbanner" id="contact">
	<div class="container">
		<div class="row">
			<div class="tv-block-heading">
				<h5>Latest foody news</h5>
				<h2>Get In Touch</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="tv-contact-details tv-whitebgclr">
					<h2 class="text-right"><i class="fa fa-map-marker" aria-hidden="true"></i></h2>
					<h3>Address</h3>
					<p><?php echo $riga['indirizzo'];?></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="tv-contact-details tv-whitebgclr">
					<h2 class="text-right"><i class="fa fa-phone" aria-hidden="true"></i></h2>
					<h3>Number</h3>
					<a><?php echo $riga['telefono'];?></a>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="tv-contact-details tv-whitebgclr">
					<h2 class="text-right"><i class="fa fa-envelope" aria-hidden="true"></i></h2>
					<h3>Mail</h3>
					<a href="mailto:demo@info.com"><?php echo $riga['email'];?></a>
				</div>
			</div>
		</div>
	</div>
</section>
	<?php
	
		}
}
?>