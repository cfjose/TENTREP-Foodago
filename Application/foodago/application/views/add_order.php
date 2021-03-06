<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Create Orders', $this->session->userdata['user_privileges'])){
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
					echo form_open('/Order_Controller/newOrder');
				?>
				<label for="total_amt">Total Order Amount </label>
				<input type="text" name="total_amt" class="form-control"/>

				<input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>"/>

				<label for="remarks">Remarks </label>
				<textarea name="remarks" class="form-control"></textarea>

				<label for="tracking_number">Order Tracking Number </label>
				<input type="text" name="tracking_number" id="tracking_number" class="form-control" readonly="readonly" onload="generateOrderTrackCode()" />

				<label for="is_shared">Order Sharing </label>
				<select name="is_shared" class="form-control" id="order_share" onchange="checkOrderStatus()">
					<option value="true">On</option>
					<option value="false" selected>Off</option>
				</select>

				<label for="share_code">Order Sharing Code </label>
				<input type="text" name="share_code" class="form-control" id="order_share_code" readonly="readonly"/>

				<label for="user_id" >User </label>
				<select name="user_id" class="form-control">
					<?php
						$getAllUsers = $this->user->getAllUser();

						foreach($getAllUsers->result() as $row){
							echo "<option value='".$row->id."'>" . $row->username . "</option>";
						}
					?>
				</select>

				<label for="delivery_status_id" >Delivery Status </label>
				<select name="delivery_status_id" class="form-control">
					<?php
						$getAllDeliveryStatus = $this->DeliveryStatus->getAllDeliveryStatus();

						foreach($getAllDeliveryStatus->result() as $row){
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