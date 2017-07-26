<?php
	if(isset($this->session->userdata['logged_in'])){
		// ACTIVE SESSION DETECTED, REDIRECT TO MAIN PAGE
		redirect(base_url() . 'index.php/main');
	}else{
		// CONTINUE WITH PAGE
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Track my order" />

	<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
	<title>Foodago</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"  type='text/css' />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200itali
	c,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/site.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/styleTrack.css">

	<!-- jQuery library -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>js/simpleCart.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>

	<style>
		input[type=text], select {
			width: 50%;
			padding: 11px 15px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			width: 15%;
			background-color: #98d091;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			margin-left: 78%;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.input {
			border-radius: 2px;
			background-color: #F6F6F6;
			padding: 5px;
			width: 60%;
			margin-left: 20%;
		}

		.input-field1 {
			margin-left: 35px;
			display: inline-block;
		}

		.input-field2 {
			margin-right: 35px;
			display: inline-block;
		}

		.button {
			margin-top: -8%;
		}
	</style>

</head>
<body>
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>/assets/images/global/logos/logoName.png" alt=""></a>
	    	</div>
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="<?php echo base_url();?>index.php">Home</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/About_Us">About Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/Contact_Us">Contact Us</a></li>
	      		<li class="active"><a href="#">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Log In</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/newUser">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>

<br><br><br>

<div class="field">
	<form action="/action_page.php">
		<div class="input">
			<div class="input-field1">
				<label for="fname">Tracking Number</label>
				<input type="text" id="fname" name="firstname">
			</div>
			<div class="input-field2">
				<label for="fname">Email Address</label>
				<input type="text" id="fname" name="firstname">
			</div>
			<div class="button">
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>
</div>

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
                    <img src="<?php echo base_url('assets/images/home/order_tracking/icons/process.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Processing Order</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="<?php echo base_url('assets/images/home/order_tracking/icons/confirm.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Confirmed Order</p>
			</div>
			<div class="quality">
				<div class="imgcircle">
                	<img src="<?php echo base_url('assets/images/home/order_tracking/icons/quality.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>Packing Order</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="<?php echo base_url('assets/images/home/order_tracking/icons/dispatch.png'); ?>" />
            	</div>
				<span class="line"></span>
				<p>On The Way</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="<?php echo base_url('assets/images/home/order_tracking/icons/delivery.png'); ?>" />
				</div>
				<p>Delivered</p>
			</div>
			
		</div>
	</div>
</div>


</body>
</html>