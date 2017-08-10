<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RestaurantStatus extends CI_Model{
		public function getAllRestaurantStatus(){
			$this->db->select('*');
			$this->db->from('restaurant_status');

			$query = $this->db->get();
			return $query;
		}

		public function getRestaurantStatusById($data){
			$this->db->select('*');
			$this->db->from('restaurant_status');
			$this->db->where("id = '" . $data . "'");

			$query = $this->db->get();
			return $query;	
		}

		public function getRestaurantStatusId($data){
			$this->db->select('id');
			$this->db->from('restaurant_status');
			$this->db->where("name ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('restaurant_status');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('restaurant_status', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Restaurant Status already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('restaurant_status', array('id' => $data['id']));	
		}
	}
?>