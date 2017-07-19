<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DeliveryStatus extends CI_Model{
		public function getDeliveryStatus($data){
			$this->db->select('name');
			$this->db->from('delivery_status');
			$this->db->where("id ='" . $data . "'");
		
			$query = $this->db->get();
			return $query;
		}
	}
?>