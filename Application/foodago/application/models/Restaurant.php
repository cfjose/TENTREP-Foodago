<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Model{
		public function getAllRestaurants(){
			$this->db->select('*');
			$this->db->from('restaurant');

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantById($data){
			$this->db->select('*');
			$this->db->from('restaurant');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantIdFromRestaurant($data){
			$this->db->select('id');
			$this->db->from('restaurant');
			$this->db->where("name ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantByStatCategory($data){
			$this->db->select('*');
			$this->db->from('restaurant');
			$this->db->where("restaurant_status_id = '" . $data['restaurant_status'] . "' AND category_id = '" . $data['category'] . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantByStatus($data){
			$this->db->select('*');
			$this->db->from('restaurant');
			$this->db->where("restaurant_status_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantName($data){
			$this->db->select('name');
			$this->db->from('restaurant');
			$this->db->where("id ='" . $data . "'");
			$this->db->limit(1);

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('restaurant');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('restaurant', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Restaurant already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('restaurant', array('id' => $data['restaurant_id']));	
		}
	}
?>