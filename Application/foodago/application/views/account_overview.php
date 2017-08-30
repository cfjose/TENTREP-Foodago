<?php
	if(isset($this->session->userdata['logged_in'])){
		// CONTINUE WITH PAGE
	}else{
		// NO ACTIVE SESSION DETECTED, REDIRECT TO LOGIN
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<!DOCTYPE html>
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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
	<style>
		.grid{
			box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);
			padding: 2%;
			margin-top: 2%;
			margin-left: 1%;
		}

		.profile-picture{ float: left; }
		.user_full_name, .membership-date{ 
			float: left;
			text-indent: 2%;
			margin-top: 0px;
		}

		.membership-date{
			font-style: italic;
		}

		.empty{
			color: #ccc;
			text-align: center;
			line-height: 100px;
		}

		.addl-margin{
			margin-left: 2%;
		}

		.fa{
			float: left;
		}

		.grid-title{
			float: left;
			text-indent: 3%;
		}

		.settings{
			padding: 8%;
			padding-bottom: 6%;
			text-align: center;
		}

		.settings:hover{
			background-color: #b71c1c;
			color: white;
			transition: 0.3s ease-in-out;
		}

		.fa-gear{
			text-indent: 35px;
		}

		.col-md-11{
			width: 860px;
		}
	</style>
</head>
<body>
	<div class="col-md-11 grid">
		<div class="profile-picture">
			<img src='<?php echo base_url(); ?>assets/images/main/icons/user.png' alt='' width='75px' height='75px'/>
		</div>
		<h3 class="user_full_name"><?php echo $this->session->userdata('first_name') . " " . $this ->session->userdata('last_name'); ?></h3><br/><br/>
		<?php
			$created_at = $this->session->userdata['created_at'];

			switch($created_at['month']){
				case 1:
					$mth_str = "January";
					break;
				case 2:
					$mth_str = "February";
					break;
				case 3:
					$mth_str = "March";
					break;
				case 4:
					$mth_str = "April";
					break;
				case 5:
					$mth_str = "May";
					break;
				case 6:
					$mth_str = "June";
					break;
				case 7:
					$mth_str = "July";
					break;
				case 8:
					$mth_str = "August";
					break;
				case 9:
					$mth_str = "September";
					break;
				case 10:
					$mth_str = "October";
					break;
				case 11:
					$mth_str = "November";
					break;
				case 12:
					$mth_str = "December";
					break;
			}
		?>
		<h5 class="membership-date">Member Since <?php echo $mth_str . " " . $created_at['year']; ?></h5>
	</div>
	<div class="col-md-5 grid">
		<i class="fa fa-history" aria-hidden="true"></i>
		<p class="grid-title">Order History</p><br/>
		<hr class="grid-divider"/>
		<?php
			$query = $this->order->getUserOrders($this->session->userdata['id']);

			$numOrders = $query->num_rows();

			if($numOrders == 0){
				echo "<h3 class='empty'>No Orders Made</h3>";
			}else{
			echo  $this->session->getUserOrders('id'); 
			}
		?>
	</div>
	<div class="col-md-6 grid addl-margin">
		<i class="fa fa-money"></i>
		<p class="grid-title">Pending Accountabilities</p><br/>		
		<hr class="grid-divider"/>
		<?php
			$query = $this->UserHasPenalty->getUserPenalties($this->session->userdata['id']);

			$numOrders = $query->num_rows();

			if($numOrders == 0){
				echo "<h3 class='empty'>You have no pending accountabilities</h3>";
			}else{
				// PRINT EACH ACCOUNTABILITY IN A DIV
			}
		?>
	</div>
	<div class="col-md-8 grid">
		<i class="fa fa-comments"></i>
		<p class="grid-title">Recent Feedbacks</p><br/>
		<hr class="grid-divider"/>
		<?php
			$query = $this->FeedbackHasUser->getUserFeedback($this->session->userdata['id']);

			$numOrders = $query->num_rows();

			if($numOrders == 0){
				echo "<h3 class='empty'>No Recent Feedbacks</h3>";
			}else{
				// PRINT EACH ORDERS IN A DIV
			}
		?>
	</div>
	<a href='<?php echo base_url(); ?>index.php/profile?page_view=acct_settings'>
		<div class="col-md-3 grid addl-margin settings">
			<i class="fa fa-gear"></i><br/><br/>
			<h4>Settings</h4>
		</div>
	</a>
</body>