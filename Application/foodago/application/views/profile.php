<?php
	if(isset($this->session->userdata['logged_in'])){
		// CONTINUE WITH PAGE
	}else{
		// NO ACTIVE SESSION DETECTED, REDIRECT TO LOGIN
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/boostrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

	<!-- jQuery library -->
	<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>

	<style>
		body{
			overflow-x: hidden;
		}
		
		.caret{
			color: orange;
		}

		.dropdown{
			margin: 3px;
			right: 25%;
		}

		.row .vertical-menu {
			margin-top: 50px;
			float: left;
		    width: 20%;
		    background-color: #b71c1c;
		    height: 660px;
		    padding-left: 15px;
		    position: fixed;
		}

		.row .vertical-menu a {
		    background-color: #b71c1c;
		    color: white;
		    display: block;
		    line-height: 30px;
		    padding: 12px;
		    text-decoration: none;
		}

		.row .vertical-menu a:hover {
		    background-color: #ff9800;
		    color: white;
		}

		.row .vertical-menu a.active:visited, .vertical-menu a.active {
		    background-color: white;
		    color: #b71c1c;
		}

		.row .vertical-menu a:visited{
			color: white;
		}

		.profile-content{
			margin-top: 50px;
			padding: 3%;
			width: 80%;
			float: right;
			background-color: white;
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
	<div class="row">
		<div class="vertical-menu">
			<?php
				if(isset($_GET['page_view'])){
					if($_GET['page_view'] == 'profile'){
						echo "<a href='' class='active'>My Profile</a>";
						echo "<a href='".base_url()."index.php/profile?page_view=acct_settings'>Account Settings</a>";
						$content = 'account_overview';
					}else if($_GET['page_view'] == 'acct_settings'){
						echo "<a href='".base_url()."index.php/profile?page_view=profile'>My Profile</a>";
						echo "<a href='' class='active'>Account Settings</a>";
						$content = 'account_settings';
					}else{
						// DO NOTHING
					}
				}
			?>
		</div>
		<div class="profile-content">
			<?php
				$this->load->view($content);
			?>
		</div>
	</div>
</body>
</html>

