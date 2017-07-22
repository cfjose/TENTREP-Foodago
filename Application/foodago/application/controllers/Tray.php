<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tray extends CI_Controller{
		public function index(){
			$this->load->view('food_tray');
		}
	}
?>