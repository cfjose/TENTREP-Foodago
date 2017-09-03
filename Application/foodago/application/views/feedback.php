<?php

?>
<!DOCTYPE html>
<html>
<head>
	a<<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
	<title>Foodago</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/boostrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/review.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<script src="<?php echo base_url(); ?>/js/recommendation.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

	<style>
		.carousel-inner{
			height: 600px;
		}

		.header{ 
			max-height: 600px; 
			width: 100%;
			filter: brightness(40%);
		}

		.search{
			top: 25%;
			left: 10%;
			width: 75%;
			position: absolute;
		}

		h1, h2{
			color: #DEB675;
			font-family: "Arial";
		}

		h5{
			color: black;
		}

		#q{
			height: 50px;
			width: 75%;
			padding: 10px;
			border-radius: 5px;
			font-size: 15px;
		}

		.sidebar{
			width: 100%;
		}

		.category-nav{
			width: 30%;
			margin:10px;
		}

		.food-item-list{
			width: 100%;
			left: 25%;
			top: 35%;
			min-height:100px;
			margin-left:-380px;
		}

		.subcategory-pane{
			height: 300px;
		}

		.sub-category-names{
			text-indent: 5%;
			line-height: 30px;
		}

		.no-avail{
			text-align: center;
			vertical-align: middle;
			margin-top: 10%;
		}

		.caret{
			color: orange;
		}

		.dropdown{
			margin: 3px;
			right: 25%;
		}
		.hr0{
			margin: 5px;
			color: black;
		}

		.panel-default{
			border-color: black;
			color: black;
		}
		
		a{
			text-decoration: none;
		}
		.count-input {
		  position: relative;
		  width: 70%;
		  max-width: 165px;
		  margin: 10px 0;
		}
		.count-input input {
		  width: 70%;
		  height: 10px;
		  border-radius: 2px;
		  background: none;
		  text-align: center;
		}
		.count-input input:focus {
		  outline: none;

		}
		.count-input .incr-btn {
		  display: block;
		  position: absolute;
		  width: 30px;
		  height: 10px;
		  font-size: 16px;
		  font-weight: 300;
		  text-align: center;
		  line-height: 30px;
		  top: 50%;
		  right: 0;
		  margin-top: -15px;
		  text-decoration:none;
		  border-radius: 15px;
		}
		.count-input .incr-btn:first-child {
		  right: auto;
		  left: 0;
		  top: 46%;
		}
		.count-input.count-input-sm {
		  max-width: 125px;
		}
		.count-input.count-input-sm input {
		  height: 36px;
		}
		.count-input.count-input-lg {
		  max-width: 200px;
		}
		.count-input.count-input-lg input {
		  height: 70px;
		  border-radius: 3px;
		}
		.btn-white{
			background-color: transparent;
			padding: 0px;
			margin-top: 20px;
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
		    	<div class="dropdown">
		    		<!--<label class="username"><?php echo $this->session->userdata('username'); ?></label>-->
		    		<img src="<?php echo base_url('assets/images/main/icons/user.png'); ?>" height="45" width="45" data-toggle="dropdown"/>
					<span class="caret"></span>
					<ul class="dropdown-menu">
						<p align="center">You are currently logged in as <b><?php echo $this->session->userdata('first_name') . " " . $this->session->userdata('last_name'); ?></b></p>
						<li class="divider"></li>
						<li><a href="<?php echo base_url(); ?>index.php/profile">My Profile</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/profile/accountSettings">Account Settings</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>
					</ul>
	  			</div>
	    	</ul>
	  	</div>
	</nav>
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo base_url(); ?>assets/images/main/main-bg.jpg" alt="" class="header">
			<div class="search">
				<form method="get" action="<?php base_url(); ?>index.php/search">
					<h1 id="greetings"></h1>
					<script type="text/javascript">
						window.onload = function(){
							var currDate = new Date();
							var currTime = currDate.getHours();

							var greet;

							if(currTime < 12){
								greet = 'Good Morning';
							}else if(currTime >= 12 && currTime <= 17){
								greet = 'Good Afternoon';
							}else if(currTime >=17 && currTime <= 24){
								greet = 'Good Evening';
							}

							document.getElementById("greetings").innerHTML = greet + ", " + <?php echo json_encode($this->session->userdata('first_name')) ?>;
						}
					</script>
					<h2>Are you Hungry?</h2>
					<h2>Search for your favorite restaurants / fast food chains online</h2><br/>
					<input type="text" id="q" placeholder="Search for Restaurants and Fast food Chains"/>
				</form>
			</div>
	  	</div>
	</div>
	

	<div class="recommendation" style="margin-bottom: 10px;">
		<div class="recTitle" style="margin: 5px 0 17px;">Popular Restaurant for Burgers</div>
			<div class="w3-content w3-display-container">
			
				<img class="mySlides" src="https://pbs.twimg.com/profile_images/694921357864386563/p0nF8Bj8.jpg" style="width:90%; height: 200px; ">
			 	<img class="mySlides" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Mcdonalds-90s-logo.svg/220px-Mcdonalds-90s-logo.svg.png" style="width:90%; height: 200px; ">
			 	

			 	<button class="recBtn" style="color: grey;" onclick="plusDivs(-1)">❮ Prev</button>
    			<button class="recBtn" style="color: grey;" onclick="plusDivs(1)">Next ❯</button>
			</div>
	</div>
	
	<hr style="border-top: 2px solid #8c8b8b; width: 50%; margin-left: 60px;" >
	<div>
		<div class="container-fluid review">
			<div>
				<?php
					$getFoodItem = $this->FoodItem->getFoodItemById($_GET['refid']);
					$getAllFeedbacks = $this->feedback->getFeedbackById($_GET['refid']);
				?>
				<h2>Rating and Reviews for <?php echo $getFoodItem->row('name'); ?></h2>
				<div style="width: 500px">
				<button class="myButton" data-toggle="collapse" data-target="#demo">Write your review</button></div>
			</div>
			<div id="demo" class="collapse"> 
				<h3>Please share your experience about this item</h3><hr/>
				<?php
					echo form_open('/Feedback_Controller/newFeedback');
				?>
				<div class="col-md-5">

					<label for="remark">Remark</label><br/>
					<textarea name="remark" class="form-control"></textarea><br/><br/><br/>
					<input type="hidden" value="<?php echo $_GET['refid']; ?>" name="refid"/>

					<label for="rating">Rating </label><br/>
					<input type="number" name="rating" min="1" max="5" value="1" class="form-control"/>
					<!-- <div class="stars">
					    <form action="">
					      <input class="star star-5" id="star-5-2" type="radio" name="star"/>
					      <label class="star star-5" for="star-5-2"></label>
					      <input class="star star-4" id="star-4-2" type="radio" name="star"/>
					      <label class="star star-4" for="star-4-2"></label>
					      <input class="star star-3" id="star-3-2" type="radio" name="star"/>
					      <label class="star star-3" for="star-3-2"></label>
					      <input class="star star-2" id="star-2-2" type="radio" name="star"/>
					      <label class="star star-2" for="star-2-2"></label>
					      <input class="star star-1" id="star-1-2" type="radio" name="star"/>
					      <label class="star star-1" for="star-1-2"></label>
					    </form>
					</div> -->
					<input type='submit' name='submit' value='Submit' class='btn btn-success'><br/><br/>
					
				</div>
					
			</div>
		</div>
		
		<div class="row review">
			<div class="col-md-4">
				<p class="aveProdRat">Average Product Rating</p>
				<h2><b>5</b> out of 5</h2>
				<h3>2 ratings 2 reviews</h3>
			</div>
			<div class="col-md-8">
				<ul style="list-style: none"><br>
					<li class="ratingBarList">5 star<span class="ratingBarCell"><span class="ratingBarLine2"></span></span>2</li>
					<li class="ratingBarList">4 star<span class="ratingBarCell"><span class="ratingBarLine"></span></span>0</li>
					<li class="ratingBarList">3 star<span class="ratingBarCell"><span class="ratingBarLine"></span></span>0</li>
					<li class="ratingBarList">2 star<span class="ratingBarCell"><span class="ratingBarLine"></span></span>0</li>
					<li class="ratingBarList">1 star<span class="ratingBarCell"><span class="ratingBarLine"></span></span>0</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="reviewsSection">
		<div class="reviewTitle">
			<h4 class="reviewTitleHead">Product Reviews</h4>
			<div class="reviewFilter" style="display: inline-block; margin: 20px;">
				<span class="select_theme_review">Filter by:</span>
			</div>
			<div class="reviewSort" style="display: inline-block; margin: 20px;">
				<span class="select_theme_review">Sort by:</span>
			</div>
		</div>

		<ul class="reviewLists" style="list-style: none;">
			<li style="margin-bottom: 15px;">
				<div class="reviewDetails">
					<span class="ratingOption"></span>
					<span class="revTitle">Create product and service</span>
					<span style="text-align: right;">1 day ago</span>
				</div>
				<div class="reviewAuthor">
					By Chamber Jose
				</div>
				<div class="reviewDetailDesc">
					Hello! This is amaaaaaaaaaazing!!!!
				</div>
			</li>
		</ul>
        <hr>

        <ul class="reviewLists" style="list-style: none;">
            <li style="margin-bottom: 15px;">
                <div class="reviewDetails">
                    <span class="ratingOption"></span>
                    <span class="revTitle">Five Stars</span>
                    <span style="text-align: right;">2 days ago</span>
                </div>
                <div class="reviewAuthor">
                    By Renzo Tadeo
                </div>
                <div class="reviewDetailDesc">
                    Hello! This is amaaaaaaaaaazing!!!!
                </div>
            </li>
        </ul>
        <hr>

        <ul class="reviewLists" style="list-style: none;">
            <li style="margin-bottom: 15px;">
                <div class="reviewDetails">
                    <span class="ratingOption"></span>
                    <span class="revTitle">Four Stars</span>
                    <span style="text-align: right;">1 hour ago</span>
                </div>
                <div class="reviewAuthor">
                    By Danya Balcena
                </div>
                <div class="reviewDetailDesc">
                    Hello! This is amaaaaaaaaaazing!!!!
                </div>
            </li>
        </ul>
        <hr>
	</div>

	

	<style type="text/css">
		.review{
			margin: 50px;
		}

		.myButton {
			-moz-box-shadow: 0px 1px 0px 0px #fff6af;
			-webkit-box-shadow: 0px 1px 0px 0px #fff6af;
			box-shadow: 0px 1px 0px 0px #fff6af;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
			background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
			background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
			background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
			background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
			background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
			background-color:#ffec64;
			-moz-border-radius:6px;
			-webkit-border-radius:6px;
			border-radius:6px;
			border:1px solid #ffaa22;
			display:inline-block;
			cursor:pointer;
			color:#333333;
			font-family:Arial;
			font-size:15px;
			font-weight:bold;
			padding:6px 24px;
			text-decoration:none;
			text-shadow:0px 1px 0px #ffee66;
			width: 50px;
		}
		.myButton:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
			background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
			background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
			background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
			background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
			background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
			background-color:#ffab23;
		}
		.myButton:active {
			position:relative;
			top:1px;
		}

		@import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);


		div.stars {
		  width: 300px;
		  display: inline-block;
		}

		input.star { 
			display: none; 
		}

		label.star {
		  float: right;
		  padding: 10px;
		  font-size: 36px;
		  color: #444;
		  transition: all .2s;
		}

		input.star:checked ~ label.star:before {
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}

		input.star-5:checked ~ label.star:before {
		  color: #FE7;
		  text-shadow: 0 0 20px #952;
		}

		input.star-1:checked ~ label.star:before { color: #F62; }

		label.star:hover { transform: rotate(-15deg) scale(1.3); }

		label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}

		.recBtn{
			-webkit-touch-callout:none;
			-webkit-user-select:none;
			-khtml-user-select:none;
			-moz-user-select:none;
			-ms-user-select:none;
			user-select:none
		}   
		.recBtn{
			border:none;
			display:inline-block;
			outline:0;padding:8px 16px;
			vertical-align:middle;overflow:hidden;
			text-decoration:none;color:inherit;
			background-color:inherit;
			text-align:center;
			cursor:pointer;
			white-space:nowrap
		}
	</style>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-46156385-1', 'cssscript.com');
	  ga('send', 'pageview');

	  /*For slider*/
	  var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  if (n > x.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
	</script>


</body>

</html>
