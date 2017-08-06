<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SubCategory extends CI_Model{
		public function getAllSubCategory(){
			$this->db->select('*');
			$this->db->from('sub_category');

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
	}
?>