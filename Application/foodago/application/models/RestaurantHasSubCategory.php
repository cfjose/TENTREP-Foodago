<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RestaurantHasSubCategory extends CI_Model{
		public function getAllRestaurantHasSubCategory(){
			$this->db->select('*');
			$this->db->from('restaurant_has_sub_category');

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantSubCategory($data){
			$this->db->select('sub_category_id');
			$this->db->from('restaurant_has_sub_category');
			$this->db->where("restaurant_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('restaurant_has_sub_category');
			$this->db->where("restaurant_id ='" . $data['restaurant_id'] . "' AND sub_category_id ='" . $data['sub_category_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('restaurant_has_sub_category', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Restaurant Sub Category already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			
		}
	}
?>