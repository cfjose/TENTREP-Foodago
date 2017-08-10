<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Delete Orders', $this->session->userdata['user_privileges'])){
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
			function generateOrderCode(length, chars){
				var result = '';
			    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
			    return result;
			}

			function checkOrderStatus(){
				if(document.getElementById('order_share').value == "true"){
					var code = generateOrderCode(12, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
					document.getElementById('order_share_code').value = code;
				}else{
					if(document.getElementById('order_share_code').value != ''){
						document.getElementById('order_share_code').value = '';
					}
				}
			}

			window.onload = function(){
				var code = generateOrderCode(12, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');
				document.getElementById('tracking_number').value = code;
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
					echo form_open('/Order_Controller/deleteOrder');

					$getOrder = $this->order->getOrderById($_GET['refid']);
				?>
				<input type="hidden" name="id" value="<?php echo $_GET['refid']; ?>"/>
				<p>You are about to delete a user's order with tracking code <?php echo $getOrder->row('tracking_number'); ?>. Are you sure you want to continue?</p>
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