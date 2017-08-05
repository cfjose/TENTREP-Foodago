<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Create Contact Numbers', $this->session->userdata['user_privileges'])){
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
				background-color: #2196f3;
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
			function get_restaurant_value(){
				var get_value = $("#restaurant").val();

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
					echo form_open('/Food_Items_Controller/newFoodItem');
				?>
				<label for="name">Product Name </label>
				<input type="text" name="name" class="form-control"/>

				<label for="price">Price </label><br/>
				<input type="text" name="price" class="form-control"/>

				<label for="calorie_count">Calorie Count </label><br/>
				<input type="text" name="calorie_count" class="form-control"/>

				<label for="restaurant_id">Restaurant </label><br/>
				<select name="restaurant_id" class="form-control" id="restaurant" onchange="get_restaurant_value()">
					<?php
						$getAllRestaurants = $this->restaurant->getAllRestaurants();

						foreach($getAllRestaurants->result() as $row){
							echo "<option value='".$row->id."'>" . $row->name . "</option>";
						}
					?>
				</select>

				<label for="sub_category_id">Sub Category </label><br/>
				<select name="sub_category_id" class="form-control">
					<?php
						$getAllRestaurantSubCategory = $this->SubCategory->getAllSubCategory();

						foreach($getAllRestaurantSubCategory->result() as $row){
							echo "<option value='".$row->id."'>" . $row->name . "</option>";
						}
					?>
				</select>
			</div>
			<div class="col-md-12 grid header">
				<input type='submit' name='submit' value='Submit' class='btn btn-success'>
				<a href='<?php echo base_url(); ?>index.php/admin?page_view=admin_table&tn=<?php echo $_GET['dbt']; ?>&mn=<?php echo $_GET['ref_mod']; ?>' class='btn btn-warning'>Cancel</a>
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