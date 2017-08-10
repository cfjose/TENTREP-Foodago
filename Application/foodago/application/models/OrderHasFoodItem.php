<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class OrderHasFoodItem extends CI_Model{
		public function getAllOrderHasFoodItem(){
			$this->db->select('*');
			$this->db->from('order_has_food_items');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('order_has_food_items');
			$this->db->where("order_id ='" . $data['order_id'] . "' AND food_items_id ='" . $data['food_items_id'] . "' AND order_has_user_user_id ='" . $data['order_has_user_user_id'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('order_has_food_items', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Order Food Item already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			
		}
	}
?>