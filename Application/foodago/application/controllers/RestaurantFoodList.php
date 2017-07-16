<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class TrackOrder extends CI_Controller{
		public function index(){
			$this->load->view('restaurant_foodlist');
		}
	}
?>