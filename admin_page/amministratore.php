<?php include('php/uploadProfile.php');
  if(!isset($_SESSION['user_id'])){
    header("Location: ../admin_page/amministratore.php");
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png"/>
    <title>Foodfries - Admin page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/styleProfile.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/website-font/stylesheet.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
  <!--	<script type='text/javascript' src="popupTable/js-popup-table.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/counterup.min.js" type="text/javascript"></script>
    <script src="js/waypoints.min.js" type="text/javascript"></script>
    <script src="js/custom.js"></script>
    <script src="js/image.js" type="text/javascript"></script>
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
                        <a class="navbar-brand" href="amministratore.php">
                            <img class="img-responsive" src="images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="scroll"><a href="amministratore.php">Home</a></li>

                            <!-- <li class="scroll"><a href="#restaurants">Restaurants</a></li> -->
                            <!--  <li class="scroll"><a href="#restaurants">Account</a></li> -->
                            
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
      <div class="container">
          <!--  <section class="tv-paddingT100 tv-bgbanner" id="menu">
                  <div class="container" id="profilo">
                 <div class="col-sm-2"> <br> </div> -->
                        <br> <br>
                      <!-- Start div account-->
                      <div class="col-sm-12 colaccount">
                          <br>
                          <img src="images/admin-avatar-png.png" alt="Avatar Image" class="avatar" >
                          <br>
                          <h3> <strong>Email : admin@gmail.com</h3> </strong>
                          <h3> <strong> Name : Admin</h3> </strong>
                          <h3> <strong>Surname : Admin</h3> </strong>
                            <br>

                            <?php include('php/addRestaurantModal.php') ?>
                            <br>
                            <!--<a href="orderpage.php"> <button type="button" class="button">
                              <span> See all the Orders </span>
                            </button> </a>
                      </div>-->
                       <!-- CLOSE CLASS"-->
                     </div>


  		      <div class="col-sm-12">
              <br>
              <?php include ('php/getUsers.php')?>
			 </div>
			 <div class = "col-sm-12">
              <?php include ('php/getRestaurant.php')?>
            </div>
</div>
</section>

<?php include("php/footer.php") ?>
  </body>

</html>
