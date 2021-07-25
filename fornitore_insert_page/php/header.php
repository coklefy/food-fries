<header id="home">
	<div class="main-nav">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="ristorantiList.php">
						<img class="img-responsive" src="images/logo.png" alt="logo">
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="scroll"><a href="../fornitore_insert_page/ristorantiList.php">Home</a></li>
					<!--	<li class="scroll"><a href="">Profile</a></li> -->
						<li class="scroll foodButton"><a>Food</a></li>
						<li class="scroll"> <a href="../profilo/php/logout.php">Logout</a></li>
							   <ul class="nav navbar-nav" id="navbar-notification">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <span id="notification-label" class="glyphicon glyphicon-bell"></span>

                                        <span id="notification-number" class="badge badge-notify">
                                            <!-- Numero notifiche -->
                                            <?php echo getNumNotifications(); ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu " role="menu" aria-labelledby="notification-label">
                                        <li>
                                            <p class="dropdown-header">Notifications</p>
                                        </li>
                                        <li>
                                            <div id="notification-container" class="scrollable-menu">

                                            </div>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item" id="see-all-button" data-toggle="modal" data-target="#allNotification">See all</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
						
						
					</ul>
				</div>
			</div>
		</nav>
	</div><!--/#main-nav-->
<?php
	if($resultato->num_rows > 0){
		while($row = $resultato->fetch_assoc()){
			?>	
	
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active" style="background-image: url(images/767252.jpg)">
      <div class="carousel-caption">
        <h1>Welcome back <span><?php echo $row['nome'];?></span></h1>
		<a class="btn tv-site-btn foodButton">Find your Food</a>
      </div>
    </div>
    <div class="item"  style="background-image: url(images/51931.jpg)">
      <div class="carousel-caption">
        <h1>Welcome back <span><?php echo $row['nome'];?></span></h1>
		<a class="btn tv-site-btn foodButton">Find your Food</a>
      </div>
    </div>
	<div class="item"  style="background-image: url(images/ciambelle_di_tre_tipi.jpg)">
      <div class="carousel-caption">
        <h1>Welcome back <span><?php echo $row['nome'];?></span></h1>
		<a class="btn tv-site-btn foodButton">Find your Food</a>
      </div>
    </div>
    
  </div>

</div>
	<?php
}
}
?>

</header>

<div style="display:none" class="alert_list">
  <ul class="unstyled">
		
  </ul>
</div>