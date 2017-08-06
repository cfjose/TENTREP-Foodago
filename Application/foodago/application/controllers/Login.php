<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('user');

			$this->load->model('UserTypeHasModule');

			$this->load->model('module');
		}

		public function index(){
			$this->load->view('login');
		}

		public function signup(){
			$this->load->view('signup');
		}

		public function newUser(){
			if(isset($this->session->userdata['logged_in']) && 
				$this->session->userdata['user_type'] == "System Administrator"){
				// CONTINUE WITH PAGE
				$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
				$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
				$this->form_validation->set_rules('bday', 'Birthdate', 'trim|required|xss_clean');
				$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
				$this->form_validation->set_rules('home_address', 'Home Address', 'required|xss_clean');
				$this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean');
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
				$this->form_validation->set_rules('created_at', 'Created At', 'trim|required|xss_clean');
				$this->form_validation->set_rules('user_type_id', 'User Type', 'trim|xss_clean');
				$this->form_validation->set_rules('restaurant_id', 'Restaurant', 'trim|xss_clean');

				if($this->form_validation->run() == FALSE){
					$this->load->view('signup');
				}else{
					$raw_password = $this->input->post('password');
					$password_hash = password_hash($raw_password,PASSWORD_BCRYPT);

					if(isset($this->session->userdata['logged_in']) && 
						$this->session->userdata['user_type'] == "System Administrator"){
							$this->db->select('id');
							$this->db->from('user_type');
							$this->db->where('name ="Customer"');

							$query = $this->db->get();
							$resultId = $query->row()->id;
						}else{
							$resultId = $this->input->post('user_type_id');
						}

					$data = array(
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'birthdate' => $this->input->post('bday'),
							'gender' => $this->input->post('gender'),
							'home_address' => $this->input->post('home_address'),
							'email' => $this->input->post('email'),
							'username' => $this->input->post('username'),
							'password' => $password_hash,
							'created_at' => $this->input->post('created_at'),
							'user_type_id' => $resultId);

					$result = $this->user->newUserInsert($data);

					if($result == TRUE){
						$data['message_display'] = "Registration Successful";
						redirect(base_url() . 'index.php/login/userLogin');
					}else{
						$data['message_display'] = "Username already in use";
						$this->load->view('signup', $data);
					}
				}
			}else{
				// ACTIVE SESSION DETECTED, REDIRECT TO MAIN PAGE
				redirect(base_url() . 'index.php/main');
			}
		}

		public function userlogin(){
			if(isset($this->session->userdata['logged_in'])){
				// ACTIVE SESSION DETECTED, REDIRECT TO MAIN PAGE
				redirect(base_url() . 'index.php/main');
			}else{
				// CONTINUE WITH PAGE
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

				if($this->form_validation->run() == FALSE){
					if(isset($this->session->userdata['logged_in'])){
						$this->load->view('main');
					}else{
						$this->load->view('login');
					}
				}else{
					$data = array('username' => $this->input->post('username'),
									'password' => $this->input->post('password'));

					$result = $this->user->login($data);

					if($result == TRUE){
						$username = $this->input->post('username');
						$result = $this->user->validateUser($username);

						if($result != FALSE){
							$this->db->select('name');
							$this->db->from('user_type');
							$this->db->where("id ='" . $result[0]->user_type_id . "'");

							$query = $this->db->get();

							$session_data = array('first_name' => $result[0]->first_name,
													'last_name' => $result[0]->last_name,
													'username' => $result[0]->username,
													'email' => $result[0]->email,
													'id' => $result[0]->id,
													'created_at' => date_parse($result[0]->created_at),
													'recent_searches' => array(),
													'food_tray' => array('Sample', 'Test', 'Qwerty'),
													'logged_in' => TRUE,
													'user_type' => $query->row()->name,
													'user_type_id' => $result[0]->user_type_id,
													'user_privileges' => array());

							$getUserPrivileges = $this->UserTypeHasModule->getUserTypeModuleIds($result[0]->user_type_id);

							foreach($getUserPrivileges->result() as $row){
								$getModuleName = $this->module->getModuleNames($row->module_id);

								foreach($getModuleName->result() as $row){
									$session_data['user_privileges'][] = $row->name;
								}
							}

							$this->session->set_userdata($session_data);

							$tz = 'Asia/Manila';
							$timestamp = time();
							$dt = new DateTime("now", new DateTimeZone($tz));
							$dt->setTimeStamp($timestamp);

							$data = array('last_online_at' => $dt->format('Y-m-d H:i:s'));

							$this->db->update('user', $data, 'id =' . $session_data['id']);

							if($session_data['user_type'] == 'Customer'){
								// REDIRECT TO USER PAGE
								redirect(base_url() . "index.php/main");
							}else if($session_data['user_type'] == 'Aggregator' ||
									$session_data['user_type'] == 'Restaurant Owner' ||
									$session_data['user_type'] == 'System Admin'){
								// REDIRECT TO ADMIN DASHBOARD
								redirect(base_url() . "index.php/admin?page_view=admin_dash");
							}		
						}
					}else{
						$data = array('error_message' => 'Invalid Username or Password');
						$this->load->view('login', $data);
					}
				}
			}
		}

		public function logout(){
			$sess_array = array('username' => '',
								'recent_searches' => array(),
								'food_tray' => array());

			$this->session->unset_userdata('logged_in', $sess_array);
			redirect(base_url() . 'index.php/login/userLogin');
		}
	}
?>