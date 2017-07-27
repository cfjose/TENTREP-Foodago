<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Penalty extends CI_Model{
		public function getUserPenalties($data){
			$this->db->select('*');
			$this->db->from('user_has_penalty');
			$this->db->where("user_id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}
	}
?>