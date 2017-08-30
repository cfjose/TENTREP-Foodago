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
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/timeline.css">

	<!-- jQuery library -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>js/simpleCart.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/timeline.js"></script>

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
		  margin: 10px;
		  padding: 20px;
		  background-color: white;
		  opacity: 0.9;
		  filter: alpha(opacity=90); /* For IE8 and earlier */
		  height: 90%;
		}

		div.transbox p {
		  font-weight: bold;
		  color: #000000;
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
			<h1 align="center" style="margin-top: 2%">Foodago Timeline</h1>
<section class="cd-horizontal-timeline" style="margin-top: 2%">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<li><a href="#0" data-date="20/06/2017" class="selected" style=" font-size: 18px;">20 Jun</a></li>
					<li><a href="#0" data-date="23/06/2017" style=" font-size: 18px;">23 Jun</a></li>
					<li><a href="#0" data-date="27/06/2017" style=" font-size: 18px;">27 Jun</a></li>
					<li><a href="#0" data-date="30/06/2017" style=" font-size: 18px;">30 Jun</a></li>
					<li><a href="#0" data-date="03/07/2017" style=" font-size: 18px;">03 Jul</a></li>
					<li><a href="#0" data-date="04/07/2017" style=" font-size: 18px;">04 Jul</a></li>
					<li><a href="#0" data-date="11/07/2017" style=" font-size: 18px;">11 Jul</a></li>
					<li><a href="#0" data-date="17/07/2017" style=" font-size: 18px;">17 Jul</a></li>
					<li><a href="#0" data-date="25/07/2017" style=" font-size: 18px;">25 Jul</a></li>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->

		<ul class="cd-timeline-navigation">
			<li style="list-style-type: none"><a href="#0" class="prev inactive">Prev</a></li>
			<li style="list-style-type: none"><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<li class="selected" data-date="20/06/2017">
				<h3>Team was formed</h3>
				<em> June 20th, 2017</em>
				<p>
					Foodago is a web application that can make ordering of your different favorite food easier. With Foodago, you can order different food to different fast food chains or restaurants and track where your orders are easily.
					Hassle-free! Just stay at your home and order! You can also share your orders to your friends. No need to memorize and to compute or even write their orders to a paper when they order too many food!<br>
					<i>With Foodago, your favorite food, delivered fast to your doorsteps.</i>
				</p>
			</li>

			<li data-date="23/06/2017">
				<h3>Getting Ideas</h3>
				<em>June 23rd, 2017</em>
				<p>	
					Brainstorming of ideas for project
				</p>
			</li>

			<li data-date="27/06/2017">
				<h3>Concept</h3>
				<em>June 27th, 2017</em>
				<p>	
					Concept of Foodago was created
				</p>
			</li>

			<li data-date="30/06/2017">
				<h3>Validated Learning</h3>
				<em>June 30th, 2017</em>
				<p>	
					Survey was conducted
				</p>
			</li>

			<li data-date="03/07/2017">
				<h3>Results</h3>
				<em>July 3rd, 2017</em>
				<p>	
					Results of surveys were gathered and analyzed			
				</p>
			</li>
			<li data-date="04/07/2017">
				<h3>Establishing Plan for Development</h3>
				<em>July 4th, 2017</em>
				<p>
					Identified roles of team members for each scrum sprint, and activities every schedule.
				</p>
			</li>
			<li data-date="04/11/2017">
				<h3>First Sprint</h3>
				<em>July 11th, 2017</em>
				<p>
					System development started
				</p>
			</li>
			<li data-date="04/17/2017">
				<h3>Second Sprint</h3>
				<em>July 17th, 2017</em>
				<p>
					
				</p>
			</li>
			<li data-date="04/25/2017">
				<h3>Third Sprint</h3>
				<em>July 25th, 2017</em>
				<p>
					
				</p>
			</li>

			
		</ol>
	</div> <!-- .events-content -->
</section>
		</div>
	</div>

</body>
</html>

