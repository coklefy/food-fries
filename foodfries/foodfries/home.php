<!--Template Name: foodfries
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->
<?php
  include('php/select_restorant.php');
  include('../../registration/server.php');

  if(!isset($_SESSION['user_id'])){
    header("Location: ../../registration/login.php");
  }else{
		  $str = $_SESSION['user_id'];
		    if(ctype_digit($str)){
		   	header("Location: ../../fornitore_insert_page/ristorantiList.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/favicon.png"/>
        <title>FoodFries</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="fonts/website-font/stylesheet.css" rel="stylesheet" type="text/css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/counterup.min.js" type="text/javascript"></script>
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/custom.js"></script>

    </head>
    <body>
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
                            <a class="navbar-brand" href="../foodfries/home.php">
                                <img class="img-responsive" src="images/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                              <!--  <li class="scroll"><a href="#home">Home</a></li> -->
                                <li class="scroll resButton"><a>Restaurants</a></li>
                                <li class="scroll"><a href="../../profilo/profile.php">Account</a></li>
                                <li class="scroll"><a href="#contact">Contact</a></li>
                                <li class="scroll"><a href="../../admin_page/php/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div><!--/#main-nav-->
            <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="caption">
                            <h1>Welcome to <span>FoodFries</span></h1>
                            <a class="btn tv-site-btn resButton">Find your restaurant</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="tv-paddingT100 tv-bgbanner" id="menu">
            <div class="container" id="restaurants">
                <div class="row">
                    <div class="tv-block-heading">
                        <h2>Our Restaurant </h2>
                    </div>
                </div>
							<?php
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								?>
						<!-- single item -->
						<div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
						  <div class="card ">
							<div class="img-container">
							  <img src="images/<?php echo $row['image'];?>" class="card-img-top store-img" alt="">
							<!--   <span class="store-item-icon">
								<i class="fas fa-shopping-cart add_to_cart" data-id_ristorante="<?php echo $row['piva'];?>"  ></i>
							  </span>-->
							</div>
							<div class="card-body">
							  <div class="card-text d-flex justify-content-between text-capitalize">
									<!-- food name -->
									  <h2>
										  <?php echo $row['nome'];?>

									  </h2>
									<small class="price"><?php echo $row['indirizzo'];?>,<?php echo $row['civico'];?></small>


									<!-- food price -->
							  </div>
							  <div>
								<button type="button" class="btn btn-outline-warning  add_to_cart" data-id_ristorante="<?php echo $row['piva'];?>">Visit</button>
							  </div>
							</div>
						</div>
						  <!-- end of card-->
						</div>
						<?php
						}
						}
						else
						{ echo "No data found";}
					?>

            </div>
        </section>

        <footer>
            <div class="tv-footer-content" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tv-footer-about text-center">
                                <img src="images/logo2.png" alt="logo">
                                <p>Food Fries is an online food order and delivery service.
                                  It acts as an intermediary between independent take-out food outlets and customers.
                                  It is headquartered in the London, England and operates in 13 countries in Europe, Asia, Oceania, and the Americas.
                                </p>
                            </div>
                            <div class="tv-footer-address">
                                <ul>
                                    <li><p>Via Cesare Battisti, 179, 47522 Cesena FC</p></li>
                                    <li><a href="tel: 0039-1234-5678-9">0039 1234 56789</a></li>
                                    <li><a href="mailto:foodfries@info.com">foodfries@info.com</a></li>
                                </ul>
                            </div>
                            <div class="tv-footer-social-icons">
                                <ul>
                                    <li>
                                        <a href="http://www.facebook.com">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.twitter.com">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.instagram.com">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a id="back-to-top" class="scrollTop tv-back-to-top" href="javascript:void(0);" style="display: none;">
            <i class="fa fa-caret-up" aria-hidden="true"></i>
        </a>
        <script>
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            });

			$(".add_to_cart").click(function(event){
				console.log("invioooo");
				 var id_ristorante=Number($(this).attr("data-id_ristorante"));
				 window.location.href= '../../cliente_order_page/ristorantiList.php?id='+id_ristorante
			});
			
			$(" .resButton").click(function () {
				$(location).attr('href', '#restaurants');
				$(".card").addClass("animated bounceInLeft pulse").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					$(".card").removeClass("animated bounceInLeft pulse")
				});
				
			});
        </script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
