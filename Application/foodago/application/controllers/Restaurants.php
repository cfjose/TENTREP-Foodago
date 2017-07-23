<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurants extends CI_Controller{
		public function index(){
			$page_title = "Create Restaurant";

			$this->db->select('*');
			$this->db->from('user_type');
			$this->db->where("name ='" . $this->session->userdata['user_type'] . "'");

			$query = $this->db->get();
			$resultUserTypeId = $query->row()->id;

			$this->db->select('*');
			$this->db->from('module');
			$this->db->where("name ='" . $page_title . "'");

			$query = $this->db->get();
			$resultModuleId = $query->row()->id;

			$this->db->select('*');
			$this->db->from('user_type_has_module');
			$this->db->where("user_type_id ='" . $resultUserTypeId . "' AND module_id ='" . $resultModuleId . "'");

			$query = $this->db->get();
			$resultNum = $query->num_rows();

			if($resultNum == 0){
				echo "Error!";
			}else{
				$this->load->view('profile');
			}
		}
	}
?>