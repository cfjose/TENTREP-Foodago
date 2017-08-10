<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserHasPenalty extends CI_Model{
		public function getAllUserHasPenalty(){
			$this->db->select('*');
			$this->db->from('user_has_penalty');

			$query = $this->db->get();
			return $query;
		}

		public function getUserPenalties($data){
			$this->db->select('*');
			$this->db->from('user_has_penalty');
			$this->db->where("user_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('user_has_penalty');
			$this->db->where("user_id ='" . $data['user_id'] . "' AND penalty_id ='" . $data['penalty_id'] . "' AND order_id ='" . $data['order_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('user_has_penalty', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'User Penalty already implemented';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			
		}
	}
?>