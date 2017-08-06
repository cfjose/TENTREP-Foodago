<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Order extends CI_Model{
		public function getOrderStatus($data){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->where("tracking_number ='" . $data['tracking_number'] . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getUserOrders($data){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->where("user_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getNewOrders(){
			$this->db->select('id');
			$this->db->from('delivery_status');
			$this->db->where("name ='Processing Order'");

			$query = $this->db->get();

			$this->db->select('*');
			$this->db->from('order');
			$this->db->where("delivery_status_id ='" . $query->row('id') . "'");

			$query = $this->db->get();
			return $query;
		}

		public function getAllOrders(){
			$this->db->select('*');
			$this->db->from('order');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
        	$this->db->insert('order', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
        }
	}
?>