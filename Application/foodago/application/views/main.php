<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
	}else{
		// NO ACCESS ALLOWED, REDIRECT TO LOGIN PAGE
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<html>
<head>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
	<title>Foodago</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/boostrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">

    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

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
			font-family: "";
			font-weight: bold;
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
			float: left;
			width: 20%;
		}

		.col-md-2{
			width: 100%;
			top: 50;
			left: 3%;
		}

		.food-item-list{
			float: right;
			width: 75%;
			left: 25%;
			top: 35%;
			min-height:100px;
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

		.col-md-4{
			left:10%;
		}
	</style>
</head>
<body>
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>/assets/images/global/logos/logoName.png" alt=""></a>
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
	<div class="sidebar">
		<div class="col-md-2">
			<div class="category-nav">
				<h4> Categories </h4><br/>
				<?php
					$query = $this->category->getCategoryNames();

					foreach ($query->result() as $row){
						$name = $row->name;

						$categoryId = $this->category->getCategoryId($name);

						// GET NUMBER OF RESTAURANT PER CATEGORY, IF 0, DO NOT PRINT CATEGORY
						$query = $this->restaurant->getResId($categoryId);
						$totalResCount = $query->num_rows();

						if($totalResCount == 0){
							// DO NOT PRINT CATEGORY
						}else{
							echo "<div data-role='collapsible'>";
							echo "<h5>" . $name . "</h5>";
							echo "<ul data-role='listview'>";

							$query = $this->restaurant->getResId($categoryId);

							foreach($query->result() as $row){
								$result = $this->restaurant->getRestaurantName($row->restaurant_id);
								$row = $result->row()->name;

								echo "<li><a href='" . base_url() . "index.php/main?restaurant_name=". $row ."'>" . $row . "</a></li>";
							}

							echo "</ul>";
							echo "</div>";
						}
	                }
				?>
			</div>
		</div>
		<div class="food-item-list">
			<?php
				if(isset($_GET['restaurant_name'])){
					$this->load->view('food_item_list',$_GET['restaurant_name']);
				}else{
					// CREATE ANOTHER LAYOUT WITH MESSAGE 'SELECT A CATEGORY TO START' AND LOAD INTO DIV
				}
			?>
		</div>
	</div>
</body>
</html>