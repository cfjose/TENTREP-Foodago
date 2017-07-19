<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
	<title>Foodago</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"  type='text/css' />
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  type="text/css" media="all" />

	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
	</script>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200itali
	c,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

	<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" type='text/css' />

	<script>
		new WOW().init();
	</script>

	<script src="<?php echo base_url(); ?>js/simpleCart.min.js"> </script>	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>

	<style>
		.carousel-inner{
			height: 550px;
		}

		.carousel-caption{
			top: 375px;
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
	      		<li class="active"><a href="#">Home</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/About_Us">About Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/Contact_Us">Contact Us</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/TrackOrder">Track my Order</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/userLogin">Login</a></li>
	      		<li><a href="<?php echo base_url(); ?>index.php/login/newUser">Sign Up</a></li>
	    	</ul>
	  	</div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

  		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
			  <img src="<?php echo base_url(); ?>assets/images/home/index/image-1.jpg" alt="">
			  <div class="carousel-caption">
			  	<h2>Welcome to Foodago!</h2>
			  	<h4>Your favorite food, delivered fast to your doorsteps</h4>
			  </div>
			</div>

			<div class="item">
			  <img src="<?php echo base_url(); ?>assets/images/home/index/image-2.jpg" alt="" width="100%">
			  <div class="carousel-caption">
			  	<h2>Satisfaction in every bite</h2>
			  	<h4>Don't let yourself be disappointed with restaurants' food and services<br/>
			  		Read Reviews and Recommendations and see which best fits your cravings</h4>
			  </div>
			</div>

			<div class="item">
			  <img src="<?php echo base_url(); ?>assets/images/home/index/image-3.jpeg" alt="">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="ordering-section" id="Order">
		<div class="container">
			<div class="ordering-section-head text-center wow bounceInRight" data-wow-delay="0.4s">
				<h3>Ordering food was never so easy</h3>
				<div class="dotted-line">
					<h4>Just 4 steps to follow </h4>
				</div>
			</div>
			<div class="ordering-section-grids">
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="one"></i><br>
						<i class="one-icon"></i>
						<p>Create <span>an Account</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="two"></i><br>
						<i class="two-icon"></i>
						<p>Browse & Order  <span>Your Food</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="three"></i><br>
						<i class="three-icon"></i>
						<p>Wait & Pay<span> when your food arrived</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="four"></i><br>
						<i class="four-icon"></i>
						<p>Enjoy <span>your food </span></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
							
			$().UItoTop({ easingType: 'easeOutQuart' });
							
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<div class="special-offers-section">
		<div class="container">
			<div class="special-offers-section-head text-center dotted-line">
				<h4>Affiliated Restaurants</h4>
			</div>
				<div class="special-offers-section-grids">
			 		<div class="m_3"><span class="middle-dotted-line"> </span> </div>
			   			<div class="container">
				  			<ul id="flexiselDemo3">
								<li>
                                    <div class="ch-item">
                                        <div class="ch-info">
                                            <div class="ch-info-front ch-img-2"></div>
                                            <div class="ch-info-back">
                                                <h3><a href="">BARISTA</a></h3>
                                            </div>
                                        </div>
                                    </div>

								</li>
								<li>
                                    <div class="ch-item">
                                        <div class="ch-info">
                                            <div class="ch-info-front ch-img-3"></div>
                                            <div class="ch-info-back">
                                                <h3><a href="">PIZZA</a></h3>
                                            </div>
                                        </div>
                                    </div>
								</li>
								<li>
                                    <div class="ch-item">
                                        <div class="ch-info">
                                            <div class="ch-info-front ch-img-4"></div>
                                            <div class="ch-info-back">
                                                <h3><a href="">DOMINO PIZZA</a></h3>
                                            </div>
                                        </div>
                                    </div>
							    </li>
                                <li>
                                    <div class="ch-item">
                                        <div class="ch-info">
                                            <div class="ch-info-front ch-img-5"></div>
                                            <div class="ch-info-back">
                                                <h3><a href="">KFC</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </li>
				 			</ul>
			<!--Add logo of restaurants-->
						</div>
					</div>
				</div>
	<div class="popular-restaurents" id="Popular-Restaurants">
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8 top-cuisines">
			<div class="special-offers-section-head text-center dotted-line">
				<h4>Top Cuisines</h4>
			</div>
				<div class="top-cuisine-grids">
					<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine1.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine2.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine3.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid nth-grid wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine4.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine5.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine6.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine7.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="top-cuisine-grid nth-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
					    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine8.jpg" class="img-responsive" alt="" /> </a>
						<label>Cuisine Name</label>
				    </div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<footer class="footer">
		<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Site Links</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">About Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Contact Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Privacy Policy</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Terms of Use</a></li>
						</ul>
					</div>

					<div class="col-md-3 contact-section-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>Follow Us On...</h4>
						<ul>
							<li><i class="fb"></i></li>
							<li class="data"> <a href="#">Facebook</a></li>
						</ul>
						<ul>
							<li><i class="tw"></i></li>
							<li class="data"> <a href="#">Twitter</a></li>
						</ul>
						<ul>
							<li><i class="in"></i></li>
							<li class="data"><a href="#"> Linkedin</a></li>
						</ul>
						<ul>
							<li><i class="gp"></i></li>
							<li class="data"><a href="#">Google Plus</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid nth-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>Subscribe Newsletter</h4>
						<p>To get latest updates and food deals every week</p>
						<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						<input type="submit" value="submit">
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>

    
</div>