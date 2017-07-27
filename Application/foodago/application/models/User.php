<?php
	class User extends CI_Model{
		public function newUserInsert($data){
			$condition = "username =" . "'" . $data['username'] . "'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			if ($query->num_rows() == 0) {
				$this->db->insert('user', $data);
		
				if ($this->db->affected_rows() > 0) {
					return true;
				}
			} else {
				return false;
			}
		}

		public function login($data) {
			$condition = "username =" . "'" . $data['username'] . "'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				$this->db->select('password');
				$this->db->from('user');
				$this->db->where($condition);

				$query = $this->db->get();
				$pass_hash = $query->row()->password;

				$passwordIsValid = password_verify($data['password'], $pass_hash);
				
				if($passwordIsValid == TRUE){
					return true;
				}
			} else {
				return false;
			}
		}

		public function validateUser($data){
			$condition = "username =" . "'" . $data . "'";
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function updateUserInfo($data){
			// UPDATE USER QUERIES
		}
	}
?>