<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('user');
		}

		public function index(){
			$this->load->view('login');
		}

		public function signup(){
			$this->load->view('signup');
		}

		public function newUser(){
			$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
			$this->form_validation->set_rules('middle_name', 'Middle Name', 'xss_clean');	
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
			$this->form_validation->set_rules('bday', 'Birthdate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('home_address', 'Home Address', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('signup');
			}else{
				$raw_password = $this->input->post('password');
				$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
				$password_hash = password_hash($raw_password, PASSWORD_BCRYPT, array('cost' => 11, 'salt' => $salt));

				$data = array(
						firstname => $this->input->post('first_name'),
						midname => $this->input->post('middle_name'),
						lastname => $this->input->post('last_name'),
						birthdate => $this->input->post('bday'),
						gender => $this->input->post('gender'),
						address => $this->input->post('home_address'),
						email_address => $this->input->post('email'),
						user_name => $this->input->post('username'),
						password => $password_hash,
						salt => $salt);

				$result = $this->user->newUserInsert($data);

				if($result == TRUE){
					$data['message_display'] = "Registration Successful";
				}else{
					$data['message_display'] = "Username already in use";
					$this->load->view('signup', $data);
				}
			}
		}

		public function userlogin(){
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
						$session_data = array('first_name' => $result[0]->first_name,
												'last_name' => $result[0]->last_name,
												'username' => $result[0]->username,
												'email' => $result[0]->email);

						$this->session->set_userdata('logged_in', $session_data);
						$this->load->view('main');
					}
				}else{
					$data = array('error_message' => 'Invalid Username or Password');
					$this->load->view('login', $data);
				}
			}
		}

		public function logout(){
			$sess_array = array('username' => '');

			$this->session->unset_userdata('logged_in', $sess_array);
			$this->load->view('login');
		}

		/*public function getFormValues(){
			if($this->input->post('submit')){
				set_value('username');
				set_value('password');
			}
		}*/
	}
?>