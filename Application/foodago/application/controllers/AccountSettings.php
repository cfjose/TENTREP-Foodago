<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AccountSettings extends CI_Controller{
		public function accountInfo(){
			$this->form_validation->set_rules('first_name', 'First Name', 'xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean');
			$this->form_validation->set_rules('home_address', 'Home Address', 'xss_clean');
			$this->form_validation->set_rules('email', 'E-mail Address', 'trim|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean');
			$this->form_validation->set_rules('new_password', 'Password', 'trim|xss_clean');

			$config['upload_path'] = '../../assets/images/main/users/profile_pictures';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048;
			$config['max_width'] = 200;
			$config['max_height'] = 200;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if(!$this->upload->uploadProfilePic()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view()
			}

			if($this->form_validation->run() == FALSE){
				$this->load->view('account_settings');
			}else{
				if($this->input->post('new_password') != NULL){
					$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
					$this->form_validation->set_rules('retype_new_password', 'Retype New Password', 'trim|required|xss_clean');
				}
			}
		}
	}
?>