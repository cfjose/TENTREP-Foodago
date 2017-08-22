<?php
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['user_type'] == 'System Admin' ||
		   $this->session->userdata['user_type'] == 'Aggregator'){
			redirect(base_url() . 'index.php/admin?page_view=admin_dash');
		}else{
			// CONTINUE
			$getRestaurantDetails = $this->restaurant->getRestaurantById($this->session->userdata['restaurant_id']);

			$getRestaurantStatus = $this->RestaurantStatus->getRestaurantStatusById($getRestaurantDetails->row('restaurant_status_id'));
		}
	}else{
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<html>
<head>
	<style>
		.grid{
			background-color: white;
			border: 1px solid rgba(0,0,0,0.1);
			padding-top: 1%;
			padding-left: 2%;
			padding-right: 2%;
			padding-bottom: 1%;
			margin-bottom: 1%;
			margin-right: 1%;
		}

		.grid p{
			font-size: 15px;
		}

		.link-label{
			text-align: center;
			line-height: 30px;
			font-weight: bold;
		}

		.grid-title{
			margin-left: 10px;
		}

		.btn-setting{
			float: right;
		}

		.btn-store{
			margin-left: 43%;
		}

		.btn-manage{
			padding-top: 2.30%;
			padding-bottom: 4.70%;
		}
	</style>
</head>
<body>
	<div class="col-md-4 grid">
		<h4><i class="fa fa-cutlery"></i><span class="grid-title"> Restaurant Info</span></h4>
		<hr class="grid-divider"/>
		<p>Restaurant Name: <?php echo $getRestaurantDetails->row('name'); ?></p>
		<?php
			switch($getRestaurantStatus->row('name')){
				case "Active":
					$label_class = "label label-success";
					break;
				case "Pending Approval":
					$label_class = "label label-default";
					break;
				case "Inactive / Suspended":
					$label_class = "label label-danger";
					break;
				default:
					$label_class = "label label-warning";
					break;
			}
		?>
		<p>Restaurant Status: <label class="<?php echo $label_class; ?>"><?php echo $getRestaurantStatus->row('name'); ?></label></p>
		<p>Restaurant Tag(s): </p>
		<a href=""><i class="fa fa-gear fa-2x btn-setting"></i></a>
	</div>
	<a href="">
		<div class="col-md-4 grid btn-manage">
			<br/>
			<h4 class="link-label">MANAGE FOOD <br/> PRODUCTS</h4>
			<i class="fa fa-shopping-bag fa-3x btn-store"></i>
		</div>
	</a>
</body>
</html>