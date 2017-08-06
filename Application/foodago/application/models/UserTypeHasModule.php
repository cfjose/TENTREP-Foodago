<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserTypeHasModule extends CI_Model{
		public function getAllUserTypeHasModule(){
			$this->db->select('*');
			$this->db->from('user_type_has_module');

			$query = $this->db->get();
			return $query;
		}

		public function getUserTypeModuleIds($data){
			$this->db->select('module_id');
			$this->db->from('user_type_has_module');
			$this->db->where("user_type_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('user_type_has_module');
			$this->db->where("user_type_id ='" . $data['user_type_id'] . "' AND module_id ='" . $data['module_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('user_type_has_module', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'User Type Module already exists';
				return FALSE;
			}
		}
	}
?>