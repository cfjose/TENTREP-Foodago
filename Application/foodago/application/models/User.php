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

		public function getUserById($data){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getUserByUserTypeId($data){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where("user_type_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function updateUserInfo($data){
			// UPDATE USER QUERIES
		}

		public function getCustomerNum(){
			$this->db->select('id');
			$this->db->from('user_type');
			$this->db->where("name ='Customer'");

			$query = $this->db->get();

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where("user_type_id ='" . $query->row('id') . "'");

			$query = $this->db->get();
			return $query;
		} 

		public function getAllUser(){
			$this->db->select('*');
			$this->db->from('user');

			$query = $this->db->get();
			return $query;
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('feedback_has_user', array('user_id' => $data['id']));
			$this->db->delete('order_has_user', array('user_id' => $data['id']));
			$this->db->delete('order', array('user_id' => $data['id']));
			$this->db->delete('user_has_penalty', array('user_id' => $data['id']));
			$this->db->delete('user', array('id' => $data['id']));

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
?>