<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Penalty extends CI_Model{
		public function getAllPenalty(){
			$this->db->select('*');
			$this->db->from('penalty');

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
        	$this->db->insert('penalty', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
        }
        
        public function update($data){

		}

		public function delete($data){
			$this->db->delete('user_has_penalty', array('penalty_id' => $data['id']));
			$this->db->delete('penalty', array('id' => $data['id']));
		}

		public function  fetch_data_penalty(){
			$this->db->select('*');
			$this->db->from('user_has_penalty');
			$this->db->order_by('penalty_id', 'DESC');

			$query = $this->db->get();
			return $query;
		}
	}
?>