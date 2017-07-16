<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Model{
		public function getCategoryNames(){
			$this->db->select('name');
			$this->db->from('category');
			$this->db->order_by('name', 'ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getCategoryId($data){
			$this->db->select('id');
			$this->db->from('category');
			$this->db->where("name ='" . $data . "'");
			$this->db->limit(1);

			$query = $this->db->get();
			$row = $query->row()->id;
			return $row;
		}
	}
?>