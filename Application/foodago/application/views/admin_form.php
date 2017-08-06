<?php
	if(isset($this->session->userdata['logged_in'])){
	  if($this->session->userdata['user_type'] == 'Aggregator' || $this->session->userdata['user_type'] == 'System Admin'){
	    // CONTINUE WITH PAGE
	  }else{
	    $this->session->userdata['current_url'] = $_SERVER['REQUEST_URI'];  
	    redirect(base_url() . 'index.php/PotentialAttempt');
	  }
	}else{
	  // NO ACTIVE SESSION DETECTED, REDIRECT TO LOGIN
	  redirect(base_url() . 'index.php/login/userLogin');
	}
?>
<html>
	<head>
		<style>
			.grid{
				padding: 1%;
				text-indent: 15px;
			}

			.header{
				background-color: #deb675;
				color: white;
				font-weight: bold;
				padding-top: 1%;
			}

			.col-md-12{
				border: 0;
			}

			.row{
				width: 9	0%;
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
				<form class="form-group" method="post" action="<?php echo base_url(); ?>index.php/Admin_Form/<?php echo $_GET['ct']; ?>">
				<?php
					$query = $this->db->list_fields($_GET['dbt']);

					foreach($query as $field){
						if($field == 'id'){
							// DO NOTHING
						}else{
							$field_trm = str_replace('_', ' ', $field);
							$field_trm = ucwords($field_trm);

							switch($field){
								case 'birthday':
								case 'birthdate':
								case 'bday':
									echo "<label>" . $field_trm . "</label>";
									echo "<input type='date' name='".$field."' class='form-control' required='required'/><br/>";
									break;

								case 'email';
								case 'email_address':
									echo "<label>" . $field_trm . "</label>";
									echo "<input type='email' name='".$field."' class='form-control' required='required'/><br/>";
									break;

								case 'gender':
								case 'sex':
									echo "<label>" . $field_trm . "</label>";
									echo "<br/><select name='".$field."' class='form-control' required='required'>";
										echo "<option value='Male'>Male</option>";
										echo "<option value='Female'>Female</option>";
									echo "</select><br/>";
									break;

								case 'password':
									echo "<label>" . $field_trm . "</label>";
									echo "<input type='password' name='".$field."' class='form-control' required='required'/><br/>";
									break;

								case strpos($field, '_id') !== FALSE:
									echo "<label>" . str_replace('Id', '', $field_trm) . "</label>";

									$get_table_name = str_replace('_id', '', $field);

									$this->db->select('*');
									$this->db->from($get_table_name);

									$query = $this->db->get();

									echo "<select name='".$field."' class='form-control' required='required'>";
										foreach($query->result() as $row){
											if($get_table_name == 'user'){
												echo "<option value='".$row->id."'>". $row->username ."</option>";
											}else if($get_table_name == 'contact_num'){
												echo "<option value='".$row->id."'>". $row->contact_num ."</option>";
											}else{
												echo "<option value='".$row->id."'>". $row->name ."</option>";
											}
										}
									echo "</select><br/>";
									break;

								case 'created_at':
									echo "<input type='hidden' name='".$field."' value='".date('Y-m-d')."'>";
									break;

								case 'last_online_at':
								case 'last_updated_at':
								case 'password_reset_token':
									// DO NOTHING
									break;

								default:
									echo "<label>" . $field_trm . "</label>";
									echo "<input type='text' name='".$field."' class='form-control'/><br/>";
									break;
							}
						}
					}
				?>	
				</form>		
			</div>
			<div class="col-md-12 grid header">
				<a href='' class='btn btn-success'>Submit</a>
				<a href='<?php echo base_url(); ?>index.php/admin?page_view=table&tn=<?php echo $_GET['dbt']; ?>&mn=<?php echo $_GET['ref_mod']; ?>' class='btn btn-warning'>Cancel</a>
			</div>
		</div>
	</body>
</html>