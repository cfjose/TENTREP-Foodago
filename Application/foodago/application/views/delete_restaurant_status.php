<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Delete Restaurant Status', $this->session->userdata['user_privileges'])){
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
	</head>
	<body>
		<div class="row">
			<div class="col-md-12 grid header">
				<p><?php echo strtoupper($_GET['ct']); ?></p>
			</div>
			<div class="col-md-12 grid body">
				<?php
					echo form_open('/Restaurant_Status_Controller/deleteRestaurantStatus');

					$getRestaurantStatus = $this->RestaurantStatus->getRestaurantStatusById($_GET['refid']);

					$getAffectedRestaurants = $this->restaurant->getRestaurantByStatus($_GET['refid']);

					if($getAffectedRestaurants->num_rows() > 0){
						echo "<p>You cannot delete '" . $getRestaurantStatus->row('name') . "' entry from restaurant status list. There are restaurants residing under '" . $getRestaurantStatus->row('name') . "' status and doing so can result to system malfunction. Please modify these restaurants and try again</p>";
					}else{
						echo form_open('/Restaurant_Status_Controller/deleteRestaurantStatus');
						echo "<input type='hidden' name='id' value='".$_GET['refid']."'/>";
						echo "<p>Are you sure you want to delete '" . $getRestaurantStatus->row('name') . "' from restaurant status list?</p>";
					}
				?>			
			</div>
			<div class="col-md-12 grid header">
				<?php 
					if($getAffectedRestaurants->num_rows() > 0){
						echo "<a href='" . base_url() . "index.php/admin?page_view=admin_table&tn=" . $_GET['dbt'] . "&mn=" . $_GET['ref_mod'] . "' class='btn btn-warning'>OK</a>";
					}else{
						echo "<input type='submit' name='submit' value='Submit' class='btn btn-success'> ";
						echo "<a href='" . base_url() . "index.php/admin?page_view=admin_table&tn=" . $_GET['dbt'] . "&mn=" . $_GET['ref_mod'] . "' class='btn btn-warning'>Cancel</a>";
					} 
				?>
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