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
				$password_hash = password_hash($raw_password,PASSWORD_BCRYPT);

				$this->db->select('id');
				$this->db->from('user_type');
				$this->db->where('name ="Customer"');

				$query = $this->db->get();
				$resultId = $query->row()->id;

				$data = array(
						'first_name' => $this->input->post('first_name'),
						'middle_name' => $this->input->post('middle_name'),
						'last_name' => $this->input->post('last_name'),
						'birthdate' => $this->input->post('bday'),
						'gender' => $this->input->post('gender'),
						'home_address' => $this->input->post('home_address'),
						'email' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'password' => $password_hash,
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
												'email' => $result[0]->email,
												'logged_in' => TRUE);

						$this->session->set_userdata($session_data);
						redirect(base_url() . 'index.php/main');					}
				}else{
					$data = array('error_message' => 'Invalid Username or Password');
					$this->load->view('login', $data);
				}
			}
		}

		public function logout(){
			$sess_array = array('username' => '');

			$this->session->unset_userdata('logged_in', $sess_array);
			redirect(base_url() . 'index.php/login/userLogin');
		}

		/*public function getFormValues(){
			if($this->input->post('submit')){
				set_value('username');
				set_value('password');
			}
		}*/
	}
?>