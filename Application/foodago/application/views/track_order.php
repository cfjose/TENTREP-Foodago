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

	<style type="text/css">
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
			background-color: #7cb342;
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
			font-size: 16px;
		}
		#myDIV{
    		display:hidden;
		}
		.content{
			width:60%;
			margin:3% auto 0 auto;
			height:460px;
			background-color:#F5F5F5;
		}
		.content1 {
			background-color:#98d091;
			text-align:center;
			padding:2em;
		}
		.content1 h2 {
			font-family: 'Open Sans', sans-serif;
			text-transform:uppercase;
			margin:0;
			color:#fff;
		}
		.content2 {
			background-color:#b5e6ae;
		}
		.content2-header1 {
			float:left;
			width:27%;
			text-align:center;
			padding:1.5em;
			background-color:#c5e1a5;
		}
		.content2-header1 p {
			font-size:16px;
			font-weight:700;
			color:#4E7D48;
			margin:0;
		}
		.content2-header1 span {
			font-size:14px;
			font-weight:400;
		}
		.progressbar{
			counter-reset: step;
			margin-top: 10%;

		}
		.progressbar li{
			list-style-type: none;
			float: left;
			width: 20%;
			position: relative;
			text-align: center;
		}
		.progressbar li:before {
			content: counter(step);
			counter-increment: step;
			width: 50px;
			height: 50px;
			line-height: 50px;
			border: 1px solid #ddd;
			display: block;
			text-align: center;
			margin: 0 auto 10px auto;
			border-radius: 50%;
			background-color: white;

		}
		.progressbar li:after{
			content: '';
			position: absolute;
			width: 100%
			height: 1px;
			background-color: #000;
			top: 25px;
			left: -50%;
			z-index: -1;
		}
		.progressbar li:first-child:after{
			content: none;
		}
		.progressbar li.active{
			color: black;
		}
		.progressbar li.active:before{
			border-color: green;

			background-color: green;
		}
		.progressbar li.active: + li:after{
			background-color: green;
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


	<div class="col-lg-2"></div>

	<div class="col-lg-8" style=" margin-top: 5%; height: 60%;">
		<div class="panel panel-default">
		<div class="panel-heading">
	<?php
 		echo form_open('/TrackOrder/getOrderDeliveryStatus')
 		// <form method="post" action="">
 	?>
			<div>
				<label for="tracking_number" style="margin-right: 2%; margin-left: 6%; font-size: 20px;">Tracking Number</label>
				<input type="text" id="tracking_number" name="tracking_number" required style="width: 50%">
				<input type="submit" value="Search" style="margin-left: 2%; width: 10%">
			</div>

	<?php echo form_close(); // </form> ?> 
		</div>
<div class="myDIV">
		<div class="panel-body">
		<?php
		echo "<div class='trackDesign' style='width: 100%'>";
			echo "<div class='content1'  style='background-color: #7cb342'>";
				if(isset($_SESSION['tracking_number'])){
					echo "<h2>Order Tracking Number: </h2>";
					echo "<p style='font-weight: bolder; font-size: 40px'>" . $_SESSION['tracking_number'] . "</p>";
				}
			echo "</div>";
			echo "<div class='content2' style='background-color: #aed581'>";
				echo "<div class='content2-header1' style='height: 10%; width:50%'>";
					if(isset($_SESSION['delivery_status'])){
						echo "<h3>Status : <span style='font-weight: bolder; font-size:22px'>" . $_SESSION['delivery_status'] . "</span></h3>";
					}
				echo "</div>";
				echo "<div class='content2-header1' style='height: 10%; width:50%'>";
					if(isset($_SESSION['timestamp'])){
						echo "<h3>Date : <span style='font-weight: bolder; font-size:22px'>" . $_SESSION['timestamp'] . "</span></h3>";
					}
				echo "</div>";
				echo "<div class='clear'>"; echo "</div>";
			echo "</div>";
		?> 

		<ul class="progressbar">
		<li class="active">Processing Order</li>
		<li>Confirmed Order</li>
		<li>Packing Order</li>	
		<li>On The Way</li>	
		<li>Delivered</li>		
		</ul>

		</div>
</div>
		</div>

	<div class="col-lg-2"></div>


<script type="text/javascript">

	if(document.getElementById("tracking_number").val != ""){
document.getElementById("myDIV").style.display="block";
}else{
	document.getElementById("myDIV").style.display="none";
}

</script>


</body>
</html>