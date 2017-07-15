<?php
	defined('BASEPATH') OR exi('No direct script access allowed');

	class Main extends CI_Controller{
		public function index(){
			$this->load->view('main');
		}
	}
?>