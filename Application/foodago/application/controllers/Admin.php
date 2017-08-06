<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('user');

			$this->load->model('FoodItem');
		
			$this->load->model('restaurant');

			$this->load->model('module');	

			$this->load->model('UserTypeHasModule');

			$this->load->model('order');
		}

		public function index(){
			$this->load->view('admin');
		}
	}
?>