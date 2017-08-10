<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('category');

			$this->load->model('restaurant');
		}

		public function index(){
			$this->load->view('search');
		}

		public function rfSearch(){
			$this->form_validation->set_rules('q', 'Search Keyword', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$getRestaurantsOnQuery = $this->db->select
			}
		}
	}
?>