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
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
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
<body>
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

		  	<h1>Timeline</h1>
		  	<section id="Steps" class="steps-section">
			    <h2 class="steps-header">
			      Responsive Semantic Timeline
			    </h2>

			    <div class="steps-timeline">
			    	<div class="steps-one">
			        	<img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
				        <h3 class="steps-name">
				        	Semantic
				        </h3>
				        <p class="steps-description">
				          The timeline is created using negative margins and a top border.
				        </p>
			      	</div>

			      	<div class="steps-two">
			        	<img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
			        	<h3 class="steps-name">
			          		Relative
			        	</h3>
				        <p class="steps-description">
				           All elements are positioned realtive to the parent. No absolute positioning.
				        </p>
			      	</div>

			      	<div class="steps-three">
				        <img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
				        <h3 class="steps-name">
				          Contained
				        </h3>
				        <p class="steps-description">
				           The timeline does not extend past the first and last elements.
				        </p>
			      	</div>
			    </div><!-- /.steps-timeline -->
			  </section>
		</div>
	</div>

	<style type="text/css">
		div.background {
		  background: url(../assets/images/home/about_us/image-5.jpg) repeat;
		  border: 2px solid black;
		  height: 100%;
		  width: 100%;
		}

		div.transbox {
		  margin: 30px;
		  background-color: #fdfdfd;
		  border: 1px solid black;
		  opacity: 0.6;
		  filter: alpha(opacity=60); /* For IE8 and earlier */
		  height: 80%;
		  border-radius: 4%;
		}

		div.transbox p {
		  margin: 5%;
		  font-weight: bold;
		  color: #000000;
		}

		h1{
			margin: 40px;
		}

		/*TIMELINE--------------------------------------------------*/
		$outline-width:0;
		$break-point: 500px;

		html {
		  box-sizing: border-box;
		}
		*, *:before, *:after {
		  box-sizing: inherit;
		}
		body {
		  font-family: lato;
		}

		$gray-base:     #999999;
		$brand-primary: #3498DB; //Zen Blue

		@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);

		.section-header {
		  color: $brand-primary;
		  font-weight: 400;
		  font-size: 1.4em;
		}


		.steps-header {
		  @extend .section-header;
		  margin-bottom: 20px;  
		  text-align: center;
		}
		.steps-timeline {
			outline: 1px dashed rgba(red, $outline-width);

		  	@media screen and (max-width: $break-point) {
		    	border-left: 2px solid $brand-primary;
		    	margin-left: 25px;
		    }
		  
			@media screen and (min-width: $break-point) {
				order-top: 2px solid $brand-primary;
			    padding-top: 20px;
			    margin-top: 40px;
			    margin-left: 16.65%;
			    margin-right: 16.65%;
			}
		  
			&:after {
				content: "";
			    display: table;
			    clear: both;
			}
		}
		.steps-one,
		.steps-two,
		.steps-three {
		  outline: 1px dashed rgba(green, $outline-width);
		  
		  @media screen and (max-width: $break-point) {
		    margin-left: -25px;
		  }
		  
		  @media screen and (min-width: $break-point) {
		    float: left;
		    width: 33%;  
		    margin-top: -50px;
		  }
		}
		.steps-one,
		.steps-two {
		  @media screen and (max-width: $break-point) {
		    padding-bottom: 40px;
		  }
		}
		.steps-one {
		  @media screen and (min-width: $break-point) {
		    margin-left: -16.65%;
		    margin-right: 16.65%;
		  }
		}
		.steps-two {
		  
		}
		.steps-three {
		  @media screen and (max-width: $break-point) {
		    margin-bottom: -100%;
		  }
		  @media screen and (min-width: $break-point) {
		    margin-left: 16.65%;
		    margin-right: -16.65%;
		  }
		}

		.steps-img {
		  display: block;
		  margin: auto;
		  width: 50px;
		  height: 50px;
		  border-radius: 50%; 
		  
		  @media screen and (max-width: $break-point) {
		    float: left;
		    margin-right: 20px;
		  }
		}

		.steps-name,
		.steps-description {
		  margin: 0;
		}
		.steps-name {
		  @extend .section-header;
		  
		  @media screen and (min-width: $break-point) {
		    text-align: center;
		  }
		}
		.steps-description {
		  overflow: hidden;
		  
		  @media screen and (min-width: $break-point) {
		    text-align: center;
		  }
		}


	</style>

	<script type="text/javascript">
		
	</script>

	
</body>
</html>

