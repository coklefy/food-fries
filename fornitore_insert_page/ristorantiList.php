<?php
	include 'php/select_food.php';
	include 'php/notificationsFunctions.php'; 
	include 'database/connection.php';
	if(!isset($_SESSION['user_id'])){
		header("Location: ../registration/login.php");
	}
	$id_ristorante=$_SESSION['user_id'];
	$sql1 = "SELECT * FROM ristorante where piva=$id_ristorante";
	$resultato = $mysqli->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--		<meta http-equiv="refresh" content="5"> refresh automatico -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/favicon.png"/>
        <title>FoodFries</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
		<link href="css/all.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="fonts/website-font/stylesheet.css" rel="stylesheet" type="text/css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/counterup.min.js" type="text/javascript"></script>
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/custom.js"></script>
		<script src="js/image.js"></script>
    </head>
    <body>

<?php include("php/header.php") ?>

     <section class="tv-paddingT100 tv-bgbanner" id="menu">
			<div class="container">
		  		<?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
					<div class="alert alert-success" role="alert">
						<strong>Deleted</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
					</div>
				<?php endif ?>

				<?php if (isset($_GET['status']) && $_GET['status'] == "fail_deleted") : ?>
				<div class="alert alert-danger" role="alert">
					<strong>Fail Delete</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php endif ?>

				 <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
				<div class="alert alert-success" role="alert">
					<strong>Updated</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php endif ?>

				<?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
				<div class="alert alert-danger" role="alert">
					<strong>Fail Update</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
				<?php endif ?> 


				<div class="row" class="store-items" id="store-items">
					<div class="tv-block-heading">
						<h5>Latest foody news</h5>
						<h2>Our Special Menu </h2>
					</div>
					<div class="tv-block-heading add_food">
						<button type="button" class="btn btn-outline-warning " data-toggle="modal" data-target="#insert_food" >Add New Food</button>
					</div>
					<?php
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							?>
					<!-- single item -->
					<div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item column " data-item="sweets">
					  <div class="card ">
						<div class="img-container">
						  <img src="images/<?php echo $row['image'];?>" class="card-img-top store-img" alt="">
						</div>
						<div class="card-body">
						  <div class="card-text d-flex justify-content-between text-capitalize">
								<!-- food name -->
								  <h2>
									  <?php echo $row['nome_pietanza'];?>					
								  </h2>
								  
								   <small class="price"><?php echo $row['prezzo'];?></small>
								<!-- food price -->
						  </div>
						  
						  <div class="editButton">
						  	<!-- button remove edit -->
								<button href="#editFood" class="btn btn-outline-warning  a-btn-slide-text edit" data-toggle="modal" data-target="#modal-update-<?=$row['id_pietanza']?>">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</button>						  
						  </div>
						  
						  <div class="removeButton">						  
								<a href="#removeFood" class="btn btn-outline-warning  a-btn-slide-text delete" data-toggle="modal" data-target="#modal-delete-<?=$row['id_pietanza']?>">
								   <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
						  </div> 
						  
						  
						</div>
					</div>
					  <!-- end of card-->
					</div>
					<?php include("php/modal.php") ?>
					<?php include("php/update-food_modal.php") ?>
					<?php
					}
					}
					else
					{ 
					?>
						<img class="opt" src="images/giphy.gif" width=200 height=200/>
						<div class="alert alert-info" role="alert">
							<p>You have not entered any food yet!</p>
							<p>Click on the "Add new Food" button to add a new foods!</p>
						</div>
					<?php
					}
				?>
				</div>
			</div>
        </section>
<?php include("php/allNotifications.php") ?>
<?php include("php/insert-food_modal.php") ?>
<?php include("php/footer.php") ?>
<?php include("php/top_button.php") ?>


		<script>
		
			
			$(" .navbar-nav .dropdown").click(function () {
				$.get("php/get_notification.php", function (data) {				
					 $("#notification-container").html(data);
				});
				$("#notification-number").replaceWith('<span id="notification-number" class="badge badge-notify">0</span>');
			});
			
			
			//Shake delle notifiche
			$("#navbar-notification a, navbar-notification").hover(function () {
				$("#notification-label, #notification-number").addClass("animated shake");
			}, function () {
				$("#notification-label, #notification-number").removeClass("animated shake");
			});
			
			
			$(" .foodButton").click(function () {
				$(location).attr('href', '#menu');
				$(".card").addClass("animated bounceInLeft pulse").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					$(".card").removeClass("animated bounceInLeft pulse")
				});
			});
			
			
		</script>

        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>
