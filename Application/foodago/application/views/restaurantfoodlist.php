<!DOCTYPE html>
<html>
<head>
	<title>Foodago</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/boostrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/site.css">

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

	<!-- RestaurantFoodList CSS -->
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrapRestaurantFoodList.css">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/restaurantFoodList.css">
</head>
<body>
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>/assets/images/home/logoName.png" alt=""></a>
	    	</div>
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="<?php echo base_url();?>index.php/home">Home</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/About_Us">About Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/Contact_Us">Contact Us</a></li>
	      		<li class="active"><a href="#">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/signup">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>


<br><br>

<div class="container">

        <div class="row">

            <div class="col-md-2">  
<!-- Collapsible Navigation -->
                <div data-role="main" class="ui-content">
                <div data-role="collapsible">
                <h6>American</h6>
                <ul data-role="listview">
                  <li><a href="#">Burger King</a></li>
                  <li><a href="#">KFC</a></li>
                  <li><a href="#">McDonalds</a></li>
                  <li><a href="#">Yellow Cab</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>British</h4>
                <ul data-role="listview">

                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Chinese</h4>
                <ul data-role="listview">
                  <li><a href="#">Chowking</a></li>
                  <li><a href="#">North Park Noodle House</a></li>
                  <li><a href="#">Savory Chicken</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>French</h4>
                <ul data-role="listview">
                  <li><a href="#">Paris Delice</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Greek</h4>
                <ul data-role="listview">
                  <li><a href="#">Cyma</a></li>
                  <li><a href="#">Greeka Kouzina</a></li>
                  <li><a href="#">Gyro V</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Italian</h4>
                <ul data-role="listview">
                  <li><a href="#">Italianni's Restaurant</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Japanese</h4>
                <ul data-role="listview">
                  <li><a href="#">Tokyo Tokyo</a></li>
                  <li><a href="#">Tokyo Yakiniku</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Mexican</h4>
                <ul data-role="listview">
                  <li><a href="#">El Chupacabra</a></li>
                  <li><a href="#">Taco Bell</a></li>
                </ul>
                </div>

                <div data-role="collapsible">
                <h4>Thai</h4>
                <ul data-role="listview">
                  <li><a href="#">Jatujak Thai Restaurant</a></li>
                  <li><a href="#">Soi</a></li>
                </ul>
                </div>

                </div>
            </div>

            <div class="col-md-7">
<!-- Food Listing -->
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 187.00</h5>
                                <h5><a href="#">Quarter Pounder with Cheese</a> 
                                </h5>
                                <h5>Calorie Count : 540</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">10 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 157.00</h5>
                                <h5><a href="#">Double Cheeseburger</a>
                                </h5>
                                <h5>Calorie Count : 440</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">21 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 155.00</h5>
                                <h5><a href="#">McChicken Sandwich</a>
                                </h5>
                                <h5>Calorie Count :  370</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">13 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 130.00</h5>
                                <h5><a href="#">Cheeseburger Deluxe</a>
                                </h5>
                                <h5>Calorie Count : 440</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">22 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
<!--Order Review -->
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 164.00</h5>
                                <h5><a href="#">2-pc. Chicken McDo with Rice</a>
                                </h5>
                                <h5>Calorie Count : 740</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">32 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h5 class="pull-right">Php 98.00</h5>
                                <h5><a href="#">1-pc. Chicken McDo with Rice</a>
                                </h5>
                                <h5>Calorie Count : 370</h5>
                                <a class="btn btn-primary" target="_blank" style="width:100%" href="#">Add to tray</a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">42 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="col-md-3">
            
                                <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Review Order</h4>
                        </div>
                        <div class="panel-body">
                                <div class="col-md-12">
                                    <strong>Subtotal (# item)</strong>
                                    <div class="pull-right"><span>Php </span><span>200.00</span></div>
                                </div>
                                <div class="col-md-12">
                                    <strong>Delivery Fee</strong>
                                    <div class="pull-right"><span>Php </span><span>200.00</span></div>
                                </div>

                                <hr align="left" width="50%">

                                <div class="col-md-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>Php </span><span>150.00</span></div>
                                    <hr>
                                </div>
                                
                                <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                
                        </div>
                        
                    </div>
        </div>
        </div>

    </div>

        <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>


</body>
</html>