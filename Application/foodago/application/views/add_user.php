<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Create User Accounts', $this->session->userdata['user_privileges'])){
			// CONTINUE
		}else{
			$this->session->userdata['current_url'] = $_SERVER['REQUEST_URI'];  
			redirect(base_url() . 'index.php/PotentialAttempt');
		}
	}else{
		// NO ACCESS ALLOWED, REDIRECT TO LOGIN PAGE
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<html>
	<head>
		<style>
			.grid{
				padding: 1%;
			}

			.header{
				background-color: #3c8dbc;
				color: white;
				font-weight: bold;
				padding-top: 1%;
			}

			.col-md-12{
				border: 0;
			}

			.row{
				width: 90%;
				margin: 0 auto;
			}

			.body{
				background-color: white;
			}

			.form-control{
				width: 35%;
			}
		</style>
		<script>
			function checkUtype(){
				if(document.getElementById('utype').value == 3){
					document.getElementById('restaurant').disabled = false;
				}else{
					document.getElementById('restaurant').disabled = true;
				}
			}
		</script>
	</head>
	<body>
		<div class="row">
			<div class="col-md-12 grid header">
				<p><?php echo strtoupper($_GET['ct']); ?></p>
			</div>
			<div class="col-md-12 grid body">
				<?php
					echo form_open('/login/newUser');
				?>
				<label for="last_name">Last Name </label>
				<input type="text" name="last_name" class="form-control"/>	

				<label for="first_name">First Name </label>
				<input type="text" name="first_name" class="form-control"/>	

				<label for="birthdate">Birthdate </label>
				<input type="date" name="bday" class="form-control"/>

				<label for="gender">Gender </label>
				<select name="gender" class="form-control">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>

				<label for="home_address">Home Address </label>
				<textarea name="home_address" class="form-control"></textarea>

				<label for="username">Username </label>
				<input type="text" name="username" class="form-control"/>	

				<label for="email">Email Address </label>
				<input type="email" name="email" class="form-control"/>

				<label for="password">Password </label>
				<input type="password" name="password" class="form-control"/>

				<?php
					$tz = 'Asia/Manila';
					$timestamp = time();
					$dt = new DateTime("now", new DateTimeZone($tz));
					$dt->setTimeStamp($timestamp);
				?>

				<input type="hidden" name="created_at" class="form-control" value="<?php echo $dt->format('H:i:s'); ?>"/>
				
				<label for="user_type_id">User Type </label>
				<select name="user_type_id" class="form-control" id="utype" onchange="checkUtype()">
					<?php
						$getAllUserTypes = $this->UserType->getAllUserType();

						foreach($getAllUserTypes->result() as $row){
							echo "<option value='".$row->id."'>" . $row->name . "</option>";
						}
					?>
				</select>

				<label for="restaurant_id">Restaurant </label>
				<select name="restaurant_id" class="form-control" id="restaurant" disabled=true>
					<?php
						$getAllRestaurants = $this->restaurant->getAllRestaurants();

						foreach($getAllRestaurants->result() as $row){
							echo "<option value='".$row->id."'>" .$row->name. "</option>";
						}
					?>
				</select>
							<div>
				<input type='submit' name='submit' value='Submit' class='btn btn-success'>
				<a href='<?php echo base_url(); ?>index.php/admin?page_view=admin_table&tn=<?php echo $_GET['dbt']; ?>&mn=<?php echo $_GET['ref_mod']; ?>' class='btn btn-warning'>Cancel</a>
			</div>
			</div>

			<?php
				echo form_close();
			?>
			<?php
				if(isset($message)){
					echo '<div class="message" id="msg">';
					echo $message;
					echo '</div>';
				}
			?>
		</div>
	</body>
</html>