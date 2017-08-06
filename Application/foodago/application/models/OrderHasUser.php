<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class OrderHasUser extends CI_Model{
		public function getAllOrderHasUser(){
			$this->db->select('*');
			$this->db->from('order_has_user');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('order_has_user');
			$this->db->where("user_id ='" . $data['user_id'] . "' AND order_id ='" . $data['order_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('order_has_user', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'User Order already exists';
				return FALSE;
			}
		}
	}
?>