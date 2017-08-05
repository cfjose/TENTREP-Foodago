<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class PotentialAttempt extends CI_Controller{
		public function index(){
			$this->load->view('potential_attempt');
		}
	}
?>