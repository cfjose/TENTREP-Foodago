<?php

?>
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

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

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
			font-family: "Cambria";
		}

		#q{
			height: 50px;
			width: 75%;
			padding: 10px;
			border-radius: 5px;
			font-size: 15px;
		}

		.category-nav{
			border: 1px solid black;
			border-radius: 5px;
			width: 20%;
			margin-top: 5%;
			margin-left: 3%;
			margin-bottom: 5%;
			padding: 15px;
		}
	</style>
</head>
<body>
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>/assets/images/home/logoName.png" alt=""></a>
	    	</div>
	  	</div>
	</nav>
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo base_url(); ?>assets/images/main/main-bg.jpg" alt="" class="header">
			<div class="search">
				<form method="get" action="<?php base_url(); ?>index.php/search">
					<h1>Are you Hungry?</h1><br/>
					<h2>Search for your favorite restaurants / fast food chains online</h2><br/><br/>
					<input type="text" id="q" placeholder="Search for Restaurants and Fast food Chains"/>
				</form>
			</div>
	  	</div>
	</div>
	<div class="category-nav">
		<h4> Categories </h4><br/>
		<?php
			$this->db->select('*');
			$this->db->from('category');

			$query = $this->db->get();

			foreach ($query->result() as $row){
				echo "<a href='" . base_url() . "index.php/category?name=". lcfirst($row->name) ."'>" . $row->name . "</a><br/>";
			}
		?>
	</div>
	<div class="recent-nav">
		$_SESSION['recent_searches'] = $_GET['name'];
		<h4>Recent Searches</h4>
		<?php
			for($i = 0; $i < count($_SESSION['recent_searches']); $i++){
				
			}	
		?>
	</div>
	<div class="food-item-list">
		<?php 

		?>
	</div>
</body>
</html>