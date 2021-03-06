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

	<!-- jQuery library -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>js/simpleCart.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>

	<style>
		body{ overflow-y: hidden; }

		.bg-main{
			filter: brightness(30%);
			width: 100%;
			height: 710px;
		}

		h1, h3{
            position:absolute;
            left:13%;
            font-family:"Cambria";
            color: #DEB675;
            font-weight: bold;
        }

        h1{ top: 16%; }
        h3{ top: 23%; }

        .feedback-form{
            position: absolute;
            top: 33%;
            left: 13%;
        }

        input[type='text'], input[type='email'], textarea{
            border-radius:5px;
            padding:10px;
            background-color: rgba(255,255,255,0.6);
            color:black;
        }

        input[type='text']{ 
        	width:200px; 
        	height:35px;
        }

        input[type='email']{ 
        	width: 400px; 
        	height:40px; 
        }

        textarea{ 
        	width: 400px; 
        	height:100px; 
        	resize: none; 
        }

        label{ 
        	color: #DEB675;
        	font-family: "Cambria";         
        }

        .required{ 
        	color: red; 
        	font-size: 18px;
        }

        button{ right: 100%; }
        input[type='text']:focus,
        input[type='email']:focus,
        textarea:focus{ box-shadow: 0 0 15px orange; }
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
	      		<li class="active"><a href="#">Contact Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/TrackOrder">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Login</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/newUser">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo base_url(); ?>assets/images/home/contact_us/image-4.jpg" class="bg-main">
				<h1>Let's Talk</h1>
	            <h3>We would love to hear it from you, send us your feedback</h3>

	            <form action="" method="POST" class="feedback-form">
	                <label>FULL NAME<span class="required">*</span></label><br/>
	                <input type="text" name="firstname" placeholder="First Name" required="required"/>
	                <input type="text" name="lastname" placeholder="Last Name" required="required"/><br/><br/>

	                <label>EMAIL<span class="required">*</span></label><br/>
	                <input type="email" name="email" placeholder="e.g. jsdelacruz@example.com" required="required"/><br/><br/>

	                <label>MESSAGE<span class="required">*</span> </label><br/>
	                <textarea name="message" placeholder="Type your message here" required="required"></textarea><br/><br/>

	                <button class="btn btn-danger">SUBMIT</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>