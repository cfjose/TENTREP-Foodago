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
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">

	<!-- jQuery library -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>js/simpleCart.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>

	<style>
		.carousel-inner{
			height: 710px;
		}

		.bg-main{
			filter: brightness(30%);
			opacity: 0.9;
			
		}
	</style>
</head>
<body class="safe">
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/images/global/logos/logoName.png" alt=""></a>
	    	</div>
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="<?php echo base_url();?>index.php">Home</a></li>
	      		<li class="active"><a href="#">About Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/Contact_Us">Contact Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/TrackOrder">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Login</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/newUser">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>

	<div class="background"><br><br>
		<div class="transbox">

		  	<h1>Timeline</h1><br>
		  	<h4>SAMPLE</h4>
		  	<br><br>z
		  	<h1>About Foodago</h1><br>
		  	<h4>
		  		Foodago is a web application that can make ordering of your different favorite food easier. With Foodago, you can order different food to different fast food chains or restaurants and track where your orders are easily.
		  		Hassle-free! Just stay at your home and order! You can also share your orders to your friends. No need to memorize and to compute or even write their orders to a paper when they order too many food!<br>
		  		<i>With Foodago, your favorite food, delivered fast to your doorsteps.</i>
		  	</h4>
		  	<center><img src="<?php echo base_url(); ?>assets/images/global/logos/logoBig.png" alt="" style="width: 250px; height: 250px;"></center>
		</div>
	</div>

	<style type="text/css">

		div.background {
		  background: url(../assets/images/home/about_us/image-5.jpg) repeat;
		  border: 2px solid black;
		  height: 100%;
		  width: 100%;
		}
		.safe{
			overflow-y: hidden;
		}

		div.transbox {
		  margin: 30px;
		  background-color: white;
		  border: 1px solid black;
		  opacity: 0.9;
		  filter: alpha(opacity=90); /* For IE8 and earlier */
		  height: 80%;
		  border-radius: 4%;
		}

		div.transbox p {
		  margin: 5%;
		  font-weight: bold;
		  color: #000000;
		}

		h1{
			margin-top: 20px;
			margin-left: 20px;
			margin-bottom: 0px;
		}

		h4{
			margin-left: 45px;
			margin-right: 20px;
			margin-bottom: 0px;
		}


		

	</style>	
</body>
</html>

