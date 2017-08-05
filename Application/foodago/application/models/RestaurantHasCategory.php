<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RestaurantHasCategory extends CI_Model{
		public function getRestaurantId($data){
			$this->db->select('restaurant_id');
			$this->db->from('restaurant_has_category');
			$this->db->where("category_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}	

		public function insert($data){
			$this->db->select('*');
			$this->db->from('restaurant_has_category');
			$this->db->where("restaurant_id ='" . $data['restaurant_id'] . "' AND category_id ='" . $data['category_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('restaurant_has_category', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Restaurant Category already exists';
				return FALSE;
			}
		}
	}
?>