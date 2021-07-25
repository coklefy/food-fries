<?php
	include('../registration/server.php');
	include 'database/connection.php';

	if(!isset($_SESSION['user_id'])){
		header("Location: ../registration/login.php");
	}else{
		$str = $_SESSION['user_id'];
		if(!ctype_digit($str)){

			//header("Location: ../profilo/php/logout.php");
		}
	}

	$id_ristorante=$_GET['id'];
	$sql = "SELECT * FROM pietanza where id_ristorante=$id_ristorante";
	$result = $mysqli->query($sql);
	
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
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
		<link href="css/all.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/notification.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="fonts/website-font/stylesheet.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/counterup.min.js" type="text/javascript"></script>
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/custom.js"></script>

    </head>
    <body>
	
	
<?php include("php/header.php") ?>





        <section class="tv-paddingT100 tv-bgbanner" id="menu">
			<div class="container">
				<div class="row" class="store-items" id="store-items">
					<div class="tv-block-heading">
						<h5>Latest foody news</h5>
						<h2>Our Special Menu </h2>
						<h3> Hi <?php echo $_SESSION['user_id'] ?> </h3>
						<h3>try our dishes.</h3>
						<input type="hidden" id="role" value="<?php echo $_SESSION['user_id'] ?>"/>
					</div>

					<?php
						if(!empty($result) && $result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								?>
						<!-- single item -->
						<div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
						  <div class="card">
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

									<h3 class="id_ristorante"> <?php echo $row['id_ristorante'];?></h3>
									<!-- food price -->
							  </div>
							  <div>
								<button type="button" data-name="<?php echo $row['nome_pietanza'];?>" data-id="<?php echo $row['id_pietanza'];?>"  data-prezzo="<?php echo $row['prezzo'];?>" data-immagine="images/<?php echo $row['image'];?>"  data-id_ristorante="<?php echo $row['id_ristorante'];?>" data_id_cliente="<?php echo $_SESSION['user_id']?>" class="btn btn-outline-warning  add_to_cart" >Add to cart</button>
							  </div>
							</div>
						</div>
						  <!-- end of card-->
						</div>
						<?php
						}
						}
					else
					{ 
					?>
					<div class="container wow">
						<img class="opt" src="images/giphy.gif" width=200 height=200/>
						<div class="alert alert-info" role="alert">
							<p>Be patient!</p>
							<p>we are coming with some delicious foods!</p>
						</div>
					</div>
					<?php
					}
				?>
				</div>
			</div>
        </section>


<?php include("php/cart-modal.php") ?>
<?php include("php/contact.php") ?>
<?php include("php/footer.php") ?>
<?php include("php/top_button.php") ?>
<?php include("php/payment_modal.php") ?>
<?php include("php/sorry.php") ?>
<script type='text/javascript' src="js/add_to_cart.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            });

			displayCart();

			var prezzoTotale=0;

			$(".add_to_cart").click(function(event) { // aggiungi elementi al carello quando clicca il bottone
				console.log("Add to cart");

				event.preventDefault();
				var id_pietanza= Number($(this).attr("data-id"));
				var nome_pietanza=$(this).attr("data-name");
				var immagine=$(this).attr("data-immagine");
				var prezzo=Number($(this).attr("data-prezzo"));
				var quantita=1;
				var id_ristorante=Number($(this).attr("data-id_ristorante"));
				var id_cliente=$(this).attr("data_id_cliente");
				addItemToCart(id_pietanza,id_ristorante,id_cliente,immagine,nome_pietanza,quantita,prezzo);
				console.log(listCart());
				displayCart();

			});

			function displayCart() {
				var cartArray=listCart();
				var output= "";
				for (var i in cartArray){

					output += "<tr>"+ "<td>"+"<img id='image_carello' src='" +cartArray[i].immagine+"'></td>"
					+ "<td>"+cartArray[i].nome_pietanza+"</td>"

					+ "<td>"+"<button  class='substract_item'  data-id='" + cartArray[i].id_pietanza +"'>-</button>" + "<p name='quantita'>"+cartArray[i].quantita+"<p>"+"<button  class='plus_item' data-id='" + cartArray[i].id_pietanza +"'>+</button>" +"</td>"

					+ "<td>"+"<p name='prezzo'>" +cart[i].prezzo*cart[i].quantita+"</td>" + "<td>"+ "<button type='button' class='btn btn-danger delete_item' data_cliente='"+cart[i].id_cliente + "' data-id='" + cartArray[i].id_pietanza +"'><span class='glyphicon glyphicon-remove'> </span></button>" + "</td>"
					+"</tr>"
					+"<tr>"
				}
				$("#show-cart").html(output);
				$("#cart_count").html(countCart());
				$("#total-cart").html(
					'<tr>' +
					'<td><strong>Total</strong></td>' +
					'<td id="plus1"></td>' +
					'<td></td>' +
					'<td id="total_price">'+totalCart()+'$'+'</td>' +
					'<td></td>' +
					'</tr>'
				);
			}

			$("#show-cart").on("click" ,".delete_item", function(event){
				var id_pietanza= Number($(this).attr("data-id"));
				var id_cliente=$(this).attr("data_cliente");
				console.log(id_cliente);
				removeItemFromCartAll(id_pietanza,id_cliente);
				displayCart();
			});

			$("#show-cart").on("click" ,".substract_item", function(event){
				var id_pietanza=Number($(this).attr("data-id"));
				var id_cliente=$(this).attr("data_cliente");
				removeItemFromCart(id_pietanza,id_cliente);
				displayCart();
			});
			$("#show-cart").on("click" ,".plus_item", function(event){
				var id_pietanza=Number($(this).attr("data-id"));
				addItemToCart(id_pietanza,0,0,1,0);
				displayCart();
			});

			$("#clear_cart").click(function(event){
				var id_cliente=$(this).attr("data_cliente");
				clearCart(id_cliente);
				displayCart();
			});
			//funzione per fissare quanti sec deve rimanare la notificazione
			function showFor5(){
				 var x = document.getElementById("toast")
			     x.className = "show";
			     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
			}

			$("#proceed").click(function(event){
				//funzione per fare apparire la notification dopo tot sec
				setTimeout(showFor5, 5000);

				var cart=listCart();
				var address= $("#Delivery_address").val();
				var number=$("#house_number").val();
				var city=$("#city").val();
				var cap=$("#cap").val();
				var id_ordine=$("#id_ordine").val();
				var empty = true;
				//scrivere notification message
				document.getElementById('desc').innerHTML = "Your order: "+ id_ordine +" has been shipped. Thank you!";


				$('input[type="text"]').each(function(){
				   if($(this).val()!=""){
					  empty =false;
					  return false;
					}
				 });
				if(empty == false){
					for (var i in cart) {
						var id_pietanza=cart[i].id_pietanza;
						var id_cliente=cart[i].id_cliente;
						var id_ristorante= cart[i].id_ristorante;
						var prezzo=cart[i].prezzo;
						var quantita=cart[i].quantita;

						$.post('php/checkout.php' , {id_ordine:id_ordine,id_pietanza:id_pietanza,id_cliente:id_cliente,id_ristorante:id_ristorante,prezzo:prezzo,quantita:quantita,address:address,number:number,city:city,cap:cap}, function(data){
							clearCart(id_cliente);
							$("#payment").modal('hide');
							$("#cart_count").html(countCart());
						});

					}
				} else{
					alert("insert all data required");
				}
			});

			$("#checkout").click(function(event){
				console.log("work");
				var count=countCart();
				console.log(count);
				if (count > 0) {
					$.post('php/last_idordine.php' , function(data){
						 $("#id_ordine").val(data);
					});

					var cartArray=listCart();
					var output="";
					var description="";
					for(var i in cartArray){

						output+= "<tr>"+  "<td>"+"<img id='image_carello' src='" +cartArray[i].immagine+"'></td>"  + "<td>" + cart[i].nome_pietanza + "</td>" + "<td>" + cart[i].quantita + "</td>" + "<td>" + cart[i].prezzo*cart[i].quantita + "</td>"

						}
					$("#produt").html(output);
					$("#total").html(
						'<tr>' +
						'<td><strong>Total</strong></td>' +
						'<td id="plus1"></td>' +
						'<td></td>' +
						'<td id="total_price">'+totalCart()+'$'+'</td>' +
						'<td></td>' +
						'</tr>'

					);
					$("#payment").modal('show');
					$("#myModal").modal('hide');
				}
				else
				{
					$("#myModal").modal('hide');
					alert("Ops!\nyour cart is empty!")	
				}


			});
			
			$(" .foodButton").click(function () {
				$(location).attr('href', '#menu');
				$(".card").addClass("animated bounceInLeft pulse").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					$(".card").removeClass("animated bounceInLeft pulse")
				});
				
			});
			
			
			$("#navbar-notification a, navbar-notification").hover(function () {
				$("#notification-label, #notification-number").addClass("animated shake");
			}, function () {
				$("#notification-label, #notification-number").removeClass("animated shake");
			});

        </script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>
