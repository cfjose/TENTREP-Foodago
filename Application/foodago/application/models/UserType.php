<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserType extends CI_Model{
		public function getAllUserType(){
			$this->db->select('*');
			$this->db->from('user_type');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('user_type');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('user_type', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'User Type already exists';
				return FALSE;
			}
		}
	}
?>