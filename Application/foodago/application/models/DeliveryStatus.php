<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DeliveryStatus extends CI_Model{
		public function getAllDeliveryStatus(){
			$this->db->select('*');
			$this->db->from('delivery_status');

			$query = $this->db->get();
			return $query;
		}

		public function getDeliveryStatus($data){
			$this->db->select('name');
			$this->db->from('delivery_status');
			$this->db->where("id ='" . $data . "'");
		
			$query = $this->db->get();
			return $query;
		}

		public function getDeliveryStatusByName($data){
			$this->db->select('*');
			$this->db->from('delivery_status');
			$this->db->where("name =" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('delivery_status');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('delivery_status', $data);

				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = "The Delivery Status you entered already exists. Please try another one";
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('delivery_status', array('id' => $data['id']));
		}
	}
?>