<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Order extends CI_Model{
		public function getOrderStatus($data){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->where("tracking_number ='" . $data['tracking_number'] . "'");

			$query = $this->db->get();
			return $query;		}

		public function getUserOrders($data){
			$this->db->select('*');
			$this->db->from('order');
			$this->db->where("user_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		/*public function changeStatus($data){
            $status = 'TRUE';
            $this->db->select('is_shared');
            $this->db->set('is_shared', $status);
            $this->db->where("tracking_number = '".$data. "'");
            $this->db->update('order');

            $query = $this->db->get();
            return $query;
        }*/
	}
?>