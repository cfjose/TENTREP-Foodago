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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>


	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

	<style>
		body{
			overflow-y: hidden;
		}

		.bg-main{
			width: 100%;
			height: 710px;
			filter: brightness(30%);
			opacity: 0.9;
			position: absolute;
		}

		.sub{
			width:960px;
			margin:50px auto;
			font-family:raleway;
		}

		span{
			color:red;
		}

		h2{
			background-color: rgba(255,255,255,0.7);
			text-align:center;
			border-radius: 10px 10px 0 0;
			margin: -10px -40px;
			padding: 30px;
		}


		.login{
			width:400px;
			top: 20%;
			left: 35%;
			border-radius: 10px;
			font-family:raleway;
			background-color: rgba(255,255,255,0.7);
			border: 2px solid #ccc;
			padding: 10px 40px 25px;
			position: absolute;
		}

		input[type=text],input[type=password], input[type=email]{
			width:99.5%;
			padding: 10px;
			margin-top: 8px;
			border: 1px solid #ccc;
			padding-left: 5px;
			font-size: 16px;
			font-family:raleway;
		}

		input[type=submit]{
			width: 100%;
			background-color:#FFBC00;
			color: white;
			border: 2px solid #FFCB00;
			padding: 10px;
			font-size:20px;
			cursor:pointer;
			border-radius: 5px;
			margin-bottom: 15px;
		}

		p{
			text-align: center;
		}

		.message{
			margin: 0 auto;
			margin-top:3%;
			padding: 5%;
			text-align: center;
			border: 2px solid #FFFF00;
			border-radius: 5px;
			background-color: #FFFF99;
		}

		.error_msg{
			margin: 0 auto;
			margin-top:3%;
			padding: 5%;
			text-align: center;
			border: 2px solid #FF0000;
			border-radius: 5px;
			background-color: #F08080;
		}
	</style>
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
	      		<li><a href="<?php echo base_url(); ?>index.php/TrackOrder">Track my Order</a></li>
	      		<li class="active"><a href="#">Login</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/signup">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>
	<div class="main">
		<img src="<?php echo base_url(); ?>assets/images/home/login.jpg" alt="" class="bg-main">
		<div class="sub">
			<div class="login">
				<h2>Login to your Account</h2><hr/>
				<?php
					echo form_open('/login/userLogin');
				?>
				<label for="username">Username</label><br/>
				<input type="text" id="username" name="username" placeholder="username"/><br/><br/>

				<label for="password">Password</label><br/>
				<input type="password" id="password" name="password" placeholder="********"/><br/><br/>

				<input type="submit" value="Login" class="btn btn-warning"/><br/><br/>

				<p>Don't have an account?</p><br/>
				<center><a href="<?php echo base_url(); ?>index.php/login/newUser"/>Signup </a>Now!</center>
				<?php echo form_close(); ?>
				<?php
					if(isset($logout_message)){
						echo '<div class="message">';
						echo $logout_message;
						echo '</div>';
					}

					if (isset($message_display)) {
						echo '<div class="message">';
						echo $message;
						echo '</div>';
					}

					if (isset($error_message)) {
						echo "<div class='error_msg'>";
						echo $error_message;
					}
						echo validation_errors();
						echo "</div>";
				?>
			</div>
		</div>
	</div>
</body>
</html>