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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
		a{
			text-decoration: none;
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
		<div class="col-lg-6">
			<div class="category-nav"> <br>
				<h3> Categories </h3>
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
			<div class="recent-searches-nav"> <br>
			<div class="col-lg-4">
				<h3>Recent Searches</h3>
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php
							if(isset($_GET['restaurant_name'])){
								$this->session->userdata['recent_searches'][] = $_GET['restaurant_name'];
								$recent_searches = array_unique($this->session->userdata['recent_searches']);
								for($i = 0; $i < count($recent_searches); $i++){
									echo "<a href='" . base_url() . "index.php/main?restaurant_name=". $recent_searches[$i] ."'>" . $recent_searches[$i] . "</a>";
									echo "<hr class='hr0'/>";

								}				
							}
						?>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="food-item-list"> <br>
				<?php
					if(isset($_GET['restaurant_name'])){
						$this->load->view('food_item_list',$_GET['restaurant_name']);
					}else{
						// CREATE ANOTHER LAYOUT WITH MESSAGE 'SELECT A CATEGORY TO START' AND LOAD INTO DIV
					}
				?>
			</div>
		</div>
                <div class="col-lg-3">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Review Order</h4>
                        </div>
                        <div class="panel-body">
                                <div class="col-md-12">
                                    <strong>Subtotal (# item)</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-md-12">
                                    <strong>Tax</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-md-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>-</span></div>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>150.00</span></div>
                                    <hr>
                                </div>
                                
                                <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                
                        </div>
                        
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
</body>
</html>