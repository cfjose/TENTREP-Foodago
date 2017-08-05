<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="<?php echo base_url(); ?>assets/images/global/favicon.ico">
	<title>Foodago</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"  type='text/css' />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" type='text/css' />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/site.css">

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<style>
		body{
			padding: 10%;
		}

		.grid{
			padding: 1%;
			text-indent: 15px;
		}

		.header{
			background-color: #ff0000;
			color: white;
			font-weight: bold;
		}

		.col-md-12{
			border: 0;
		}

		.row{
			box-shadow: 2px 2px 40px 10px rgba(0,0,0,0.5);
		}

	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-12 grid header">
			<p>UNWANTED ACCESS HAS BEEN DETECTED!</p>
		</div>
		<div class="col-md-12 grid">
			<p>Foodago has blocked you for accessing the page due to unwanted activity. The report will be sent to the System Administrator for analysis. If you believe you should have access with this page, please contact the System Administrator.</p><br/>

			<p><b>Collected Information</b></p><br/>

			<p class='session-detail'><b>URL:</b> <?php echo $this->session->userdata['current_url']; ?></p><br/>

			<p class='session-detail'><b>Username:</b> <?php echo $this->session->userdata['username']; ?></p><br/>

			<p class='session-detail'><b>IP Address:</b> <?php echo $_SERVER['REMOTE_ADDR']; ?></p><br/>

			<p class='session-detail'><b>Timestamp:</b> <?php echo date('Y-m-d') . " " . date('h:i:s A'); ?></p><br/>

		</div>
		<div class="col-md-12 grid header">
			<p align="right">Foodago&reg;. All rights reserved.</p>
		</div>
		<?php
			$sess_array = array('username' => '',
								'recent_searches' => array(),
								'food_tray' => array());

			$this->session->unset_userdata('logged_in', $sess_array);
		?>
	</div>
</body>