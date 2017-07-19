<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Order extends CI_Model{
		public function getOrderStatus(){
			$this->db->select('delivery_status_id');
			$this->db->from('order');
			$this->db->where("tracking_number ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}
	}
?>