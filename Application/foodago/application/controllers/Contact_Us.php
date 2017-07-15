<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Contact_Us extends CI_Controller{
		public function index(){
			$this->load->view('contact_us');
		}
	}
?>