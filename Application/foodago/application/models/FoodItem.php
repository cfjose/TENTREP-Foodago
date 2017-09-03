<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FoodItem extends CI_Model{
		public function getAllFoodItems(){
			$this->db->select('*');
			$this->db->from('food_items');

			$query = $this->db->get();
			return $query;
		}

		public function getFoodItemById($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getFoodItemsByKeyword($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("name LIKE ". $data['q']);
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

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('food_items_has_feedback', array('food_items_id' => $data['id']));
			$this->db->delete('order_has_food_items', array('food_items_id' => $data['id']));
			$this->db->delete('food_items', array('id' => $data['id']));
		}

		public function deleteByRestaurant($data){
			$this->db->select('*');
			$this->db->from('food_items');
			$this->db->where("restaurant_id ='" . $data['restaurant_id'] . "'");

			$query = $this->db->get();

			foreach($query->result() as $row){
				$this->db->delete('food_items_has_feedback', array('food_items_id' => $row->id));
				$this->db->delete('order_has_food_items', array('food_items_id' => $row->id));

				if($this->db->affected_rows() > 0){
					return TRUE;
				}else{
					return FALSE;
				}
			}
		}
	}
?>