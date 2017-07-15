<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class About_Us extends CI_Controller{
		public function index(){
			$this->load->view('about_us');
		}
	}
?>