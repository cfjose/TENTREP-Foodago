<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FoodItem extends CI_Model{
		public function getFoodItemInfo($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("restaurant_id = '" . $data['restaurant_id'] . "' AND sub_category_id ='" . $data['sub_category_id'] . "'");

			$query = $this->db->get();
			return $query;
		}
	}
?>