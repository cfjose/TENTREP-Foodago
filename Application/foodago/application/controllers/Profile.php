<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('user');
		
			$this->load->model('order');

			$this->load->model('feedback');

			$this->load->model('penalty');
		}

		public function index(){
			$this->load->view('profile');
		}

		public function accountSettings(){
			$this->load->view('account_settings');
		}
	}
?>