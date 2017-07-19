<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class SubCategory extends CI_Model{
		public function getSubCategoryName($data){
			$this->db->select('name');
			$this->db->from('sub_category');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}
	}
?>