<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RestaurantHasContactNum extends CI_Model{
		public function getAllRestaurantHasContactNum(){
			$this->db->select('*');
			$this->db->from('restaurant_has_contact_num');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('restaurant_has_contact_num');
			$this->db->where("restaurant_id ='" . $data['restaurant_id'] . "' AND contact_num_id ='" . $data['contact_num_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('restaurant_has_contact_num', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Restaurant Contact Number already exists';
				return FALSE;
			}
		}
	}
?>