<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if($this->session->userdata['user_type'] == 'Customer'){
			// CONTINUE
		}else{
			redirect(base_url() . 'index.php/admin');
		}
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/dropdowns.css">

	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		var food_item = [];

		function generateOrderCode(length, chars){
				var result = '';
			    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
				return result;
		}

		function checkOrderShareState(){
			if(document.getElementById('order_share_switch').checked == true){
				var order_sharing_code = generateOrderCode(12, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
				document.getElementById('share_code').value = order_sharing_code;
				var share_st = 1;
				var share_id = order_sharing_code;
			}else{
				document.getElementById('share_code').value = '';
				var share_st = 0;
				var share_id = '';
			}

			$.ajax({
				type: "POST",
				url: 'Main/changeShareState',
				data: {
					share_st: share_st,
					share_id: share_id
				},

				success: function(data){
					console.log("OK");
				}
			});
		}

		function addProductToTray(data){
			var item_id = data;
			$.ajax({
				type: "POST",
				url: 'Main/add',
				data: {
					item_id: item_id
				},

				success: function(data){	
					console.log("OK");
				}
			});
			$('.panel-body').load(' .panel-body');
		}

		function updateItemQty(){

		}

		function removeProductFrTray(){

		}
	</script>
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
			height: 320px;
			width: 600px;
		}

		.sub-category-names{
			text-indent: 5%;
			line-height: 30px;
		}

		.no-avail{
			text-align: center;
			vertical-align: middle;
			margin-top: 25%;
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
			padding-top: 50px;
			padding-bottom: 50px;
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

		.trackTitle{
			margin-bottom: 15px;
		    color: #254a5f;
		    font-size: 16px;
		    line-height: 18px;
		}

		.trackLabel{
			display: block;
    		color: #646464;
		}

		.trackInput{
			display: table;
		    overflow: hidden;
		    border-radius: 2px;
		}

		.inputTrack{
			display: table-cell;
    		height: 38px;
    		box-sizing: border-box;
		    padding: 10px;
		    width: 100%;
		    height: 36px;
		    border: none;
		    border-radius: 3px;
		    background: #f0f0f0;
		    box-shadow: inset 0 3px 0 0 #dfdfdf;
		    color: #000;
		}

		.trackButton{
			position: relative;
		    width: 1%;
		    font-size: 0;
		    vertical-align: middle;
		    padding: 0;
		    white-space: nowrap;
		    line-height: normal;
		    display: table-cell;
		    background: #f36f36;
		}

		.trackButton2{
			border: none;
		    background: none;
		    width: 28px;
		    height: 38px;
		}

		.navbar-right{
			display: inline-flex;
		}

		.btn-default{
			padding: 13px;
		}

		.form-control{
			width: 30%;
			text-align: center;
			margin: 0 auto;
		}

		.switch {
		  position: relative;
		  display: inline-block;
		  width: 50px;
		  height: 25px;
		}

		/* Hide default HTML checkbox */
		.switch input {display:none;}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 20px;
		  width: 20px;
		  left: 2px;
		  bottom: 2px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 17px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}

		.modal-header{
			display: inline-flex;
		}

		td{
			font-size: 14px;
		}

		#alert{
	    background:#fff;
	    -webkit-transition: 1s;
	    -moz-transition: 1s;
		transition: 1s;
	   padding:10px;
	    }
	    .affix#alert{
	    position:fixed;
	    top:0px;
	    background:#fff;
	    color:#000;
	    padding:10px;
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
		    		<button class="btn" data-toggle="dropdown"> Track Order <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<div class="outer-list top">
				    		<div class="trackTitle">Track your Order</div>
				    		<div style="margin-bottom: 10px;">
				    			<label for="username" class="trackLabel">Your 12-Character Order Tracking Code</label>
				    			<div class="trackInput">
				    				<input type="text" id="username" name="username" placeholder="e.g. A1B2C3D4E5F6" class="inputTrack"/>
				    				<span class="trackButton">
				    					<button class="trackButton2">
				    						<span class="glyphicon glyphicon-chevron-right"></span>
				    					</button>
				    				</span>
				    			</div>
				    		</div>
			    		</div>
			    	</ul>
				</div>
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
				<form method="get" action="<?php base_url(); ?>index.php/search/rfSearch">
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
					<h2>Search for your favorite restaurants / fast food chains online</h2>
					<input type="text" id="q" placeholder="Search for Restaurants and Fast food Chains"/>
					<input type="submit" name="submit" value="Search" class="btn btn-default">
				</form>
			</div>
	  	</div>
	</div>
	<div class="col-md-5">
		<div class="category-nav"> <br>
			<h4> Categories </h4><br/>
			<div class="panel-group">
				<?php
					$query = $this->category->getCategoryNames();

					foreach ($query->result() as $row){
						$name = $row->name;

						$categoryId = $this->category->getCategoryId($name);

						// GET NUMBER OF RESTAURANT PER CATEGORY, IF 0, DO NOT PRINT CATEGORY
						$query = $this->RestaurantHasCategory->getRestaurantId($categoryId);
						$totalResCount = $query->num_rows();

						if($totalResCount == 0){
							// DO NOT PRINT CATEGORY
						}else{
							$trimmed_str_name = str_replace(' ', '', $name);
							echo "<div class='panel panel-default'>";
								echo "<a data-toggle='collapse' href='#".$trimmed_str_name."'><div class='panel-heading' style='background-color:#ff6f00; color:white'>";
								echo "<h4 class='panel-title'>" . $name . "</h4></div></a>";

						      	echo "<div id='".$trimmed_str_name."' class='panel-collapse collapse'>";
						      		echo "<ul class='list-group'>";

										$query = $this->RestaurantHasCategory->getRestaurantId($categoryId);

										foreach($query->result() as $row){
											$result = $this->restaurant->getRestaurantName($row->restaurant_id);
											$row = $result->row()->name;

											echo "<li class='list-group-item' style='background-color: #fff9c4;'><a href='" . base_url() . "index.php/main?restaurant_name=". $row ."'>" . $row . "</a></li>";
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
							if(in_array($_GET['restaurant_name'], $this->session->userdata['recent_searches'])){
								// DO NOTHING
							}else{
								$this->session->userdata['recent_searches'][] = $_GET['restaurant_name'];
							}

							for($i = 0; $i < count($this->session->userdata['recent_searches']); $i++){
								echo "<a href='" . base_url() . "index.php/main?restaurant_name=". $this->session->userdata['recent_searches'][$i] ."'>" . $this->session->userdata['recent_searches'][$i] . "</a>";
								echo "<hr class='hr0'/>";
							}				
						}
					?>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4" style="margin-left: 0%">
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

	<script type="text/javascript">
		$( document ).ready(function() {
			$('#alert').affix({
		    	offset: {
		      		top: 100, bottom: function () {
		        		return (this.bottom = $('#footer').outerHeight(true))
		      		}
    			}
		  	});  
		});
	</script>
    <div class="col-md-3 food-tray" id="alert" style="margin-top: 7%">
        <!--FOOD TRAY-->
        <div class="panel-heading">
        	<h3 class="ft-header">Food Tray</h3>
        </div>
        <div class="panel-body">
        	<?php
        		$count_fi = count($this->session->userdata['food_tray']['item_id']);

        		echo "<p>Your Items (" . $count_fi . ")</p>";

        		if($count_fi == 0){
        			echo "<h4 class='no-avail-list'>NO ITEMS ADDED IN FOOD TRAY</h4>";
        			$checkout_link = '';
        		}else{
        			$checkout_link = base_url() . 'index.php/CheckOut';
        			echo "<table class='table borderless'>";
            			for($i = 0; $i < $count_fi; $i++){
            				echo "<tr>";
            				echo "<td>" . $this->session->userdata['food_tray']['item_name'][$i] . "</td>";
            				echo "<td>&#8369; " . $this->session->userdata['food_tray']['sub_amt'][$i] . "</td>";
            				echo "<td><form method='post'><input type='number' name='qty' min='1' max='100' value='".$this->session->userdata['food_tray']['item_qty'][$i]."'/></form></td>";
            				echo "</tr>";
            			}
        			echo "</table>";
        		}

        		echo "<a href='' class='btn btn-success' data-toggle='modal' data-target='#myModal'>
        				Add Friend</a>";

    			echo "<a href='".$checkout_link."' class='btn btn-warning'>Proceed to Checkout</a>";
        	?>


        </div>
    </div>

   <!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Order Sharing &nbsp;</h4>
						<label class="switch">
							<?php
								if($this->session->userdata['food_tray']['order_sharing_state'] == 0){
									$check_state = false;
								}else{
									$check_state = true;
								}
							?>
							<input type="checkbox" id="order_share_switch" onchange="checkOrderShareState()" <?php echo ($check_state == false ? '' : 'checked') ?>>
						  	<span class="slider round"></span>
						</label>
					</div>
					<div class="modal-body">
						<p>Enable Order Sharing to allow your friends add their own Food Items to your Food Tray for a more convenient food ordering transactions</p>

						<p>Once enabled, Foodago will generate a 12-Character Order Sharing Code that can be shared to your friends and family</p>

						<p>Happy Eating!</p><br/>

						<p>All the best, </p>
						<p>The Foodago Team</p>

						<p align="center"><b>12-Character Order Sharing Code</b></p>
						<input type="text" name="order_share_code" id="share_code" class="form-control" readonly="readonly" value="<?php echo $this->session->userdata['food_tray']['order_sharing_code']; ?>"/>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
</body>
</html>