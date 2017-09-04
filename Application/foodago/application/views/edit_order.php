<?php
	if(isset($this->session->userdata['logged_in'])){
		// DO NOTHING, CONTINUE WITH MAIN PAGE
		if(in_array('Update Orders', $this->session->userdata['user_privileges'])){
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
					$query = $this->order->getOrderById($_GET['refid']);
				
					echo form_open('/Order_Controller/updateOrder');
				?>
				<label for="total_amt">Total Order Amount </label>
				<input type="text" name="total_amt" value="<?php echo $query->row('total_amt'); ?>" class="form-control" readonly="readonly"/>

				<input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>"/>

				<label for="remarks">Remarks </label>
				<textarea name="remarks" value="<?php echo $query->row('remarks'); ?>" class="form-control"></textarea>

				<label for="tracking_number">Order Tracking Number </label>
				<input type="text" name="tracking_number" class="form-control" readonly="readonly" value="<?php echo $query->row('tracking_number'); ?>"/>

				<label for="is_shared">Order Sharing </label>
				<select name="is_shared" class="form-control" id="order_share" onchange="checkOrderStatus()" value="<?php echo $query->row('is_shared'); ?>" readonly="readonly">
					<?php
						if($query->row('is_shared') == 1){
							echo "<option value='1' selected='selected'>On</option>";
							echo "<option value='0'>Off</option>";
						}else{
							echo "<option value='1'>On</option>";
							echo "<option value='0' selected='selected'>Off</option>";
						}
					?>
				</select>

				<label for="share_code">Order Sharing Code </label>
				<input type="text" name="share_code" class="form-control" value="<?php echo $query->row('share_code'); ?>" id="order_share_code" readonly="readonly"/>

				<input type="hidden" name="refid" value="<?php echo $_GET['refid']; ?>"/>

				<label for="delivery_status_id" >Delivery Status </label>
				<select name="delivery_status_id" value="<?php echo $query->row('delivery_status_id'); ?>" class="form-control">
					<?php
						$getAllDeliveryStatus = $this->DeliveryStatus->getAllDeliveryStatus();
						foreach($getAllDeliveryStatus->result() as $row){
							if($row->id == $query->row('delivery_status_id')){
								echo "<option value='".$row->id."' selected='selected'>" . $row->name . "</option>";
							}else{
								// DO NOTHING
								echo "<option value='".$row->id."'>" . $row->name . "</option>";
							}
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