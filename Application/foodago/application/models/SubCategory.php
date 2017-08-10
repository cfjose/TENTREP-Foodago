<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SubCategory extends CI_Model{
		public function getAllSubCategory(){
			$this->db->select('*');
			$this->db->from('sub_category');

			$query = $this->db->get();
			return $query;
		}

		public function getSubCategoryById($data){
			$this->db->select('*');
			$this->db->from('sub_category');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getSubCategoryName($data){
			$this->db->select('name');
			$this->db->from('sub_category');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('sub_category');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('sub_category', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Sub Category already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('food_items', array('sub_category_id' => $data['id']));
			$this->db->delete('restaurant_has_sub_category', array('sub_category_id' => $data['id']));
			$this->db->delete('sub_category', array('id' => $data['id']));
		}
	}
?>