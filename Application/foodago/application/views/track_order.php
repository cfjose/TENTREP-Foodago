<!DOCTYPE html>
<html>
<head>
	<title>Foodago</title>

	<meta charset="utf-8">
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

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
			  <img src="<?php echo base_url(); ?>/assets/images/home/image-1.jpeg" alt="">
			</div>
		</div>
	</div>
</body>
</html>