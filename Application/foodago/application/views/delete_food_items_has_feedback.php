<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Create Food Item Feedbacks', $this->session->userdata['user_privileges'])){
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
					echo form_open('/Food_Items_Has_Feedback_Controller/newFoodItemsHasFeedback');
				?>
				<label for="food_item_id">Food Item </label>
				<select name='food_item_id' class='form-control'>
					<?php
						$getAllFoodItems = $this->FoodItem->getAllFoodItems();

						foreach($getAllFoodItems->result() as $row){
							echo "<option value='".$row->id."'>" . $row->name . "</option>";
						}
					?>
				</select>
				
				<label for="feedback_id">Feedback </label>
				<select name='feedback_id' class='form-control'>
					<?php
						$getAllFeedbacks = $this->feedback->getAllFeedback();

						foreach($getAllFeedbacks->result() as $row){
							echo "<option value='".$row->id."'>" . $row->remark . " (" . $row->rating . ")" . "</option>";
						}
					?>
				</select><br/>
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