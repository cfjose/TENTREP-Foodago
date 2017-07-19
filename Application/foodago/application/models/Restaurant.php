<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Model{
		public function getRestaurantName($data){
			$this->db->select('name');
			$this->db->from('restaurant');
			$this->db->where("id ='" . $data . "'");
			$this->db->limit(1);

			$query = $this->db->get();
			return $query;
		}

		public function getResId($data){
			$this->db->select('restaurant_id');
			$this->db->from('restaurant_has_category');
			$this->db->where("category_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getResIdFromRes($data){
			$this->db->select('id');
			$this->db->from('restaurant');
			$this->db->where("name ='" . $data . "'");

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
	}
?>