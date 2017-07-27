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
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/site.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/js/modal.js"></script>

	<style>
		/*body{
			overflow-y: hidden;
		}*/

		.bg-main{
			width: 100%;
			height: 760px;
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
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>/assets/images/global/logos/logoName.png" alt=""></a>
	    	</div>
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="<?php echo base_url();?>index.php">Home</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/About_Us">About Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/Contact_Us">Contact Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/TrackOrder">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Login</a></li>
	      		<li class="active"><a href="#">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>
	<div class="main">
		<img src="<?php echo base_url(); ?>assets/images/home/login_signup/login.jpg" alt="" class="bg-main">
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

					<input type="checkbox">&nbsp;By creating an account, you are bound to agree to Foodago's </input>
					<a href="#openModal">
						Terms and Conditions
					</a>
				</div>

				<!-- The Modal -->

				<div id="openModal" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close"> X </a>
						<h3><center>Terms and Conditions</center></h3>
						<p>This is a sample of modal box</p>
						<p>You could do a lot of things here like amazing!!</p>

						<p>You could do a lot of things here like amazing!!</p>
					</div>
				</div>

				<style type="text/css">
					.modalDialog{
						position: fixed;
					    font-family: Arial, Helvetica, sans-serif;
					    top: 0;
					    right: 0;
					    bottom: 0;
					    left: 0;
					    background: rgba(0, 0, 0, 0.8);
					    z-index: 99999;
					    opacity:0;
					    -webkit-transition: opacity 400ms ease-in;
					    -moz-transition: opacity 400ms ease-in;
					    transition: opacity 400ms ease-in;
					    pointer-events: none;
					}
					.modalDialog:target{
						opacity:1;
    					pointer-events: auto;
					}
					.modalDialog > div{
						width: 50%;
					    position: relative;
					    margin: 10% auto;
					    padding: 5px 20px 13px 20px;
					    border-radius: 10px;
					    background: #fff;
					    background: -moz-linear-gradient(#fff, #999);
					    background: -webkit-linear-gradient(#fff, #999);
					    background: -o-linear-gradient(#fff, #999);
					}
					.close{
						background: #606061;
					    color: #FFFFFF;
					    line-height: 25px;
					    position: absolute;
					    right: -12px;
					    text-align: center;
					    top: -10px;
					    width: 24px;
					    height: 25px;
					    text-decoration: none;
					    font-weight: bold;
					    -webkit-border-radius: 12px;
					    -moz-border-radius: 12px;
					    border-radius: 12px;
					    -moz-box-shadow: 1px 1px 3px #000;
					    -webkit-box-shadow: 1px 1px 3px #000;
					    box-shadow: 1px 1px 3px #000;
					}
					.close:hover{
						background: #00d9ff;
					}

				</style>	
				


				<div class="vertical"></div>

				<input type="submit" value="Sign Up" class="btn btn-warning"/><br/><br/>

				<p>Already have an Account? <a href="<?php echo base_url(); ?>/index.php/login/userLogin">Login</a></p><br/>
				<?php
					if (isset($message_display)) {
						echo '<div class="message" id="msg">';
						echo $message;
						echo '</div>';
					}

					if (isset($error_message)) {
						echo '<div class="error_msg" id="msg">';
						echo $error_message;
					}
						echo validation_errors();
						echo '</div>';
				?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>