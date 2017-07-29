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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			float: left;
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
		
		a, .panel-default a{
			text-decoration: none;
			color: black;
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

		.panel-default, .food-tray{
			border: 1px solid #ccc;
		}

		.food-tray{
			right: 3%;
			top: -50px;
			float: right;
		}

		.ft-header{
			margin-top: 3%;
			text-align: center;
		}

		.no-avail-list{
			line-height: 200px;
			text-align: center;
			color: #ccc;
		}

		.btn-success{
			float: left;
		}

		.btn-warning{
			float: right;
		}

		input[type='number']{
			width: 70%;
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
						<li><a href="<?php echo base_url(); ?>index.php/profile?page_view=profile">My Profile</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/profile?page_view=acct_settings">Account Settings</a></li>
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
					</script><br/>
					<h2>Are you Hungry?</h2><br/>
					<h2>Search for your favorite restaurants / fast food chains online</h2><br/>
					<input type="text" id="q" placeholder="Search for Restaurants and Fast food Chains"/>
				</form>
			</div>
	  	</div>
	</div>
		<div class="col-md-6">
			<div class="category-nav"> <br>
				<h3> Categories </h3><br/>
				<div class="panel-group">
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
								$trimmed_str_name = str_replace(' ', '', $name);
								echo "<div class='panel panel-default'>";
									echo "<a data-toggle='collapse' href='#".$trimmed_str_name."'><div class='panel-heading'>";
									echo "<h4 class='panel-title'>" . $name . "</h4></div></a>";

							      	echo "<div id='".$trimmed_str_name."' class='panel-collapse collapse'>";
							      		echo "<ul class='list-group'>";

											$query = $this->restaurant->getResId($categoryId);

											foreach($query->result() as $row){
												$result = $this->restaurant->getRestaurantName($row->restaurant_id);
												$row = $result->row()->name;

												echo "<li class='list-group-item'><a href='" . base_url() . "index.php/main?restaurant_name=". $row ."'>" . $row . "</a></li>";
											}

										echo "</ul>";
									echo "</div>";
								echo "</div>";
							}
		                }
					?>
				</div>
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
        <div class="col-md-3 food-tray">
            <!--FOOD TRAY-->
            <div class="panel-heading">
            	<h5 class="ft-header">Food Tray</h5>
            	<hr class="grid-divider"/>
            </div>
            <div class="panel-body">
            	<?php
            		$count_fi = count($this->session->userdata('food_tray'));

            		echo "<p>Your Items (" . $count_fi . ")</p>";

            		if($count_fi == 0){
            			echo "<p class='no-avail-list'>NO ITEMS ADDED IN FOOD TRAY</p>";
            		}else{
            			echo "<table class='table borderless'>";

            			for($i = 0; $i < $count_fi; $i++){
            				echo "<tr>";
            				echo "<td>" . $this->session->userdata['food_tray'][$i] . "</td>";
            				echo "<td>P 200.00</td>";
            				echo "<td><form method='post'><input type='number' name='qty' min='1' max='100' value='1'/></form></td>";
            				echo "</tr>";
            			}

            			echo "</table>";
            			echo "<a href='' class='btn btn-success' data-toggle='modal' data-target='#myModal' >Add Friend</a>";
            			echo "<a href='' class='btn btn-warning'>Proceed to Checkout</a>";
            		}
            	?>

			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sharing Code</h4>
					</div>
					<div class="modal-body">
					<p align="center">ABC123</p>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
            </div>
            <!--FOOD TRAY METHOD END-->
            <script type="text/javascript">
				$(".incr-btn").on("click", function (e) {
				var $button = $(this);
				var oldValue = $button.parent().find('.quantity').val();
				$button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
				if ($button.data('action') == "increase") {
				var newVal = parseFloat(oldValue) + 1;
				} else {
				// Don't allow decrementing below 1
				if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
				} else {
				newVal = 1;
				$button.addClass('inactive');
				}
				}
				$button.parent().find('.quantity').val(newVal);
				e.preventDefault();
				});
            </script>
        </div>
</body>
</html>