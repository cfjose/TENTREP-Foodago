<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
	}else{
		// NO ACCESS ALLOWED, REDIRECT TO LOGIN PAGE
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<HTML>
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

		.btn-warning{
			/*margin-left: 18%;*/
		}

		input[type='number']{
			width: 70%;
		}

		.opt:visited{
			color: white;
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
<!-- Navigation bar stops here -->

<br><br><br><br>

<div class="col-lg-8">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3>Individual User Food Items</h3>
		</div>
		<div class="panel-body">
		<br>
		<h4>Chamber Jose</h4>
		<hr>
		<div class="top-cuisine-grids">
			<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
			    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine1.jpg" class="img-responsive" alt="" />
			    </a>
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
		</div>

	

		<h4 style="margin-top: 30%">Johanna Heramia</h4>
		<hr>
		<div class="top-cuisine-grids">
			<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
			    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine4.jpg" class="img-responsive" alt="" />
			    </a>
				<label>Cuisine Name</label>
		    </div>
			<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
			    <a href=""><img src="<?php echo base_url(); ?>assets/images/home/index/samples/cuisine5.jpg" class="img-responsive" alt="" /> </a>
				<label>Cuisine Name</label>
		    </div>
		</div>
		</div>
	</div>
</div>	
<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3>Transaction Invoice</h3>
		</div>
		<div class="panel-body">
			<?php
				$item_amt = count($this->session->userdata['food_tray']['item_price']);
				$total_amt = 0;
				$count = 0;

				while($count < $item_amt) {
					$total_amt += ($this->session->userdata['food_tray']['item_price'][$count] * $this->session->userdata['food_tray']['item_qty'][$count]);
					$count++;
				}

				if($total_amt > 300) {
					$percent = $total_amt * .15;
					$final_total_amt = $total_amt + $percent + 30;
					$this->session->userdata['food_tray']['delivery_fee'] = 30;
					$this->session->userdata['food_tray']['service_fee'] = $percent;
					$this->session->userdata['food_tray']['total_amt'] = $final_total_amt;
					$ref_link = 'index.php/order/newOrder';
				} else {
					$ref_link = '';
				}
			?>
  			<table class="table table-hover">
			    <thead>
			      <tr>
					  <th>Name</th>
					  <th>Total Amount</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			          <td><?php echo $this->session->userdata['first_name'] . " " . $this->session->userdata['last_name'] ?></td>
			          <td><?php echo  "Php" . " " . $total_amt ?></td>
			      </tr>
			      <tr>
			          <td><i>Delivery Fee</i></td>
			          <td><i><?php echo "Php" . " " . $this->session->userdata['food_tray']['delivery_fee']; ?></i></td>
			      </tr>
				  <tr>
					  <td><i>Service Fee</i></td>
					  <td><i><?php echo "Php" . " " . $this->session->userdata['food_tray']['service_fee']; ?></i></td>
				  </tr>
			      <tr>
			        <td style="font-weight: bolder">Total Price</td>
			        <td style="font-weight: bolder"><?php echo "Php" . " " . $this->session->userdata['food_tray']['total_amt']; ?></td>
			      </tr>
			    </tbody>
  			</table>

		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
		<h3>Order Information</h3>
		</div>
		<div class="panel-body">
		<?php 
			if($this->session->userdata['food_tray']['order_sharing_state'] == 0){
				$label_class = "label label-danger";
				$label_text = "OFF";
				$share_code = "Not Available";
			}else{
				$label_class = "label label-success";
				$label_text = "ON";
				$share_code = $this->session->userdata['food_tray']['order_sharing_code'];
			}
		?>
		<h4>Order Tracking Code: <?php echo $this->session->userdata['food_tray']['order_tracking_code']; ?></h4><br/>
		<h4>Order Sharing: <label class="<?php echo $label_class; ?>"><?php echo $label_text; ?></label></h4><br/>
		<h4>Order Sharing Code: <?php echo $share_code; ?></h4><br/>
		<h4>Order Delivery Status: <label class="label label-default">Processing Order</label></h4>
		</div>
	</div>	
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3></h3>
		</div>
		<div class="panel-body">
			<center>
				<a href="" class="btn btn-success opt">< Back to Shop</a>&nbsp;
				<a href="" class="btn btn-warning opt">Proceed to Checkout ></a>
			</center>
		</div>
	</div>	
</div>	
</body>
</HTML>