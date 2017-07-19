<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class TrackOrder extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('order');

			$this->load->model('DeliveryStatus');
		}

		public function index(){
			$this->load->view('track_order');
		}
	}
?>