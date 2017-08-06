<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FoodItem extends CI_Model{
		public function getAllFoodItems(){
			$this->db->select('*');
			$this->db->from('food_items');

			$query = $this->db->get();
			return $query;
		}

		public function getFoodItemInfo($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("restaurant_id = '" . $data['restaurant_id'] . "' AND sub_category_id ='" . $data['sub_category_id'] . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("name ='" . $data['name'] . "' AND restaurant_id ='" . $data['restaurant_id'] . "' AND sub_category_id ='" . $data['sub_category_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('food_items', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Food Item already exists';
				return FALSE;
			}
		}
	}
?>