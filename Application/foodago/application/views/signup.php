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
		/*body{
			overflow-y: hidden;
		}*/

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


		.signup{
			width: 80%;
			min-height: 100px;
			top: 10%;
			left: 11%;
			border-radius: 10px;
			font-family: raleway;
			background-color: rgba(255,255,255,0.7);
			border: 2px solid #ccc;
			padding: 10px 40px 25px;
			position: absolute;
		}

		input[type=text],input[type=password], input[type=email],
		input[type=date], textarea, select{
			width: 75%;
			padding: 5px;
			margin-top: 8px;
			border: 1px solid #ccc;
			padding-left: 5px;
			font-size: 16px;
			font-family:raleway;
		}

		input[type=submit]{
			width: 100%;
			background-color:#FFBC00;
			margin-top: 5%;
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

		.left{
			float: left;
			width: 49%;
		}

		.right{
			float: right;
			width: 49%;
			padding-left: 40px;
		}

		.vertical{
			width: 1px;
			height: 400px;
			margin: 0 auto;
			border: 1px solid #808080;
		}

		textarea{
			resize: none;
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
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Login</a></li>
	      		<li class="active"><a href="#">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>
	<div class="main">
		<img src="<?php echo base_url(); ?>assets/images/home/login.jpg" alt="" class="bg-main">
		<div class="sub">
			<div class="signup">
				<h2>Create an Account</h2><hr/>
				<?php
					echo form_open('/login/newUser');
				?>
				<div class="left">
					<label for="first_name">First Name</label><br/>
					<input type="text" id="first_name" name="first_name" placeholder="John"/><br/><br/>

					<label for="middle_name">Middle Name</label><br/>
					<input type="text" id="middle_name" name="middle_name" placeholder="Middle"/><br/><br/>

					<label for="last_name">Last Name</label><br/>
					<input type="text" id="last_name" name="last_name" placeholder="Doe"/><br/><br/>

					<label for="bday">Birthdate</label><br/>
					<input type="date" id="bday" name="bday"/><br/><br/>

					<label for="gender">Gender</label><br/>
					<select name="gender">
						<option name="male">Male</option>
						<option name="female">Female</option>
					</select>
				</div>
				
				<div class="right">
					<label for="home_address">Home Address</label><br/>
					<textarea id="home_address" name="home_address" placeholder="123 ABC St., Paco, Manila"></textarea><br/><br/>

					<label for="email">Email Address</label><br/>
					<input type="email" id="email" name="email" placeholder="johndoe@example.com"/><br/><br/>

					<label for="username">Username</label><br/>
					<input type="text" id="username" name="username" placeholder="johndoe"/><br/><br/>

					<label for="password">Password</label><br/>
					<input type="password" id="password" name="password" placeholder="* * * * * * * *"/><br/><br/>

					<input type="checkbox">&nbsp;By creating an account, you are bound to agree to Foodago's <a href="">Terms and Conditions</a></input>
				</div>
				<div class="vertical"></div>

				<input type="submit" value="Sign Up" class="btn btn-warning"/><br/><br/>

				<p>Already have an Account? <a href="<?php echo base_url(); ?>/index.php/login/userLogin">Login</a></p><br/>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>