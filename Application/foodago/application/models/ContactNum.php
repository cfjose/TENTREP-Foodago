<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ContactNum extends CI_Model{
		public function getAllContactNum(){
			$this->db->select('*');
			$this->db->from('contact_num');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('contact_num');
			$this->db->where("contact_num ='" . $data['contact_num'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('contact_num', $data);

				if($this->db->affected_rows > 0){
					return TRUE;
				}
			}else{
				$message = "The Contact Number you entered already exists. Please try another one";
				return FALSE;
			}
		}
	}
?>