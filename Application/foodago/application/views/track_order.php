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

	<!-- Tracking CSS -->
	<meta name="keywords" content="Track my order" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/styleTrack.css">
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

<div class="content">
	<div class="content1">
		<h2>Order Tracking: Order No</h2>
	</div>
	<div class="content2">
		<div class="content2-header1">
			<p>Shipped Via : <span>Ipsum Dolor</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Checking Quality</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span>7-NOV-2015</span></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="<?php echo base_url('images/process.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Processing Order</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="<?php echo base_url('images/confirm.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Confirmed Order</p>
			</div>
			<div class="quality">
				<div class="imgcircle">
                	<img src="<?php echo base_url('images/quality.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Packing Order</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="<?php echo base_url('images/dispatch.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>On The Way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="<?php echo base_url('images/delivery.png'); ?>" />
				</div>
				<p>Order Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>


</body>
</html>