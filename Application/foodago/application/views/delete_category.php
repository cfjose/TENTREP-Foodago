<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Delete Categories', $this->session->userdata['user_privileges'])){
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
					echo form_open('/Category_Controller/deleteCategory');

					$getCategory = $this->category->getCategoryByid($_GET['refid']);
				?>
				<i class="fa fa-warning"></i>
				<input type="hidden" name="category_id" value="<?php $_GET['refid']; ?>"/>
				<p>You are about to delete '<?php echo $getCategory->row('name'); ?>' category from the list of restaurant categories. This will also remove all the restaurant assignments from the affected item. Are you sure you want to continue? This is NOT REVERSIBLE!</p>
			</div>
			<div class="col-md-12 grid header">
				<input type='submit' name='submit' value='Delete' class='btn btn-success'>
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