<?php include('php/uploadProfile.php');
  if(!isset($_SESSION['user_id'])){
    header("Location: ../registration/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png"/>
    <title>FoodFries - My Account</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/styleProfile.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/website-font/stylesheet.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <!--	<script type='text/javascript' src="popupTable/js-popup-table.js"></script> -->
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
                        <a class="navbar-brand" href="../foodfries/foodfries/home.php">
                            <img class="img-responsive" src="images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="scroll"><a href="../foodfries/foodfries/home.php">Home</a></li>

                            <!-- <li class="scroll"><a href="#restaurants">Restaurants</a></li> -->
                            <!--  <li class="scroll"><a href="#restaurants">Account</a></li> -->
                            <li class="scroll"><a href="#contact">Contact</a></li>
                            <span class="store-item-icon">
                            </span>
                            <li class="scroll"> <a href="php/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div><!--/#main-nav-->
    </header>

    <section class="tv-paddingT100 tv-bgbanner" id="menu">
          <div class="container" id="profilo">
          <!--  <div class="col-sm-2"> <br> </div> -->

              <!-- Start div account-->
              <div class="col-sm-12 colaccount" id="box" >
                  <img src="images/img_avatar.png" alt="Avatar Image" class="avatar" >

                  <h2>My Account</h2>
                    <br>
                  <h3>Email:<?php echo $user->email ?></h3>
                  <h3>Name: <?php echo $user->name ?></h3>
                  <h3>Surname: <?php echo $user->surname ?></h3>
                    <br>
                  <a href="#">
                      <!-- <button class="button"><span> Go to Cart </span> </button> -->
                  </a>
                </div>
                   <?php
                      include ('php/get_orders.php');
                    ?>

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
</body>


</html>
