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

		.title{
			text-indent: 15px;
		}

		.input{
			width: 50%;
		}
	</style>
</head>
<body>
	<div class="col-md-12 grid">
		<div class="col-sm-12">
			<i class="fa fa-user"></i>
			<p class="title">Personal Information</p>
			<hr class="grid-divider"/>
			<?php
				echo form_open('AccountSettings/accountInfo');
			?>
			<div class="form-group">
				<label for="first_name">First Name</label>
				<input type="text" name="first_name" class="form-control input"/><br/>

				<label for="last_name">Last Name</label>
				<input type="text" name="last_name" class="form-control input" /><br/>

				<label for="home_address">Home Address</label>
				<input type="text" name="home_address" class="form-control input"><br/> 
			</div>
		</div>
		<div class="col-sm-12">
			<i class="fa fa-shield"></i>
			<p class="title">Login Information</p>
			<hr class="grid-divider"/>
			<div class="form-group">
				<label for="email">E-Mail Address</label>
				<input type="email" name="email" class="form-control input"><br/>

				<label for="username">Username</label>
				<input type="text" name="username" class="form-control input"><br/>

				<label for="old_password">Old Password</label>
				<input type="password" name="old_password" class="form-control input"><br/>

				<label for="new_password">New Password</label>
				<input type="password" name="new_password" class="form-control input"><br/>

				<label for="retype_new_password">Retype New Password</label>
				<input type="password" name="retype_new_password" class="form-control input"><br/>
			</div>
		</div>
		<div class="col-sm-12">
			<i class="fa fa-trash"></i>
			<p class="title">Account Deletion</p>
			<hr class="grid-divider"/>
			<div class="form-group">
				<p>We don't want to see you leave, but if you really want to delete your account, just click the button below</p>
				<input type="submit" name="submit_delete_acct" value="Deactivate my Account" class="btn btn-warning"/>
			</div>
		</div>
		<div class="col-sm-12">
			<i class="fa fa-gear"></i>
			<p class="title">Account Settings</p>
			<hr class="grid-divider">
			<div class="form-group">
				<input type="submit" name="submit_save" value="Save Changes" class="btn btn-success">
				<input type="submit" name="submit_discard" value="Discard" class="btn btn-danger">
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>