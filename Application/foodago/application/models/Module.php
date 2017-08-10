<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Module extends CI_Model{
		public function getAllModule(){
			$this->db->select('*');
			$this->db->from('module');

			$query = $this->db->get();
			return $query;
		}

		public function getModuleNames($data){
			$this->db->select('*');
			$this->db->from('module');
			$this->db->where("id ='" . $data . "'");

			$query = $this->db->get();
			return $query;
		}

		public function insert($data){
			$this->db->select('*');
			$this->db->from('module');
			$this->db->where("name ='" . $data['name'] . "'");
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 0){
				$this->db->insert('module', $data);
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
			}else{
				$message = 'Module already exists';
				return FALSE;
			}
		}

		public function update($data){

		}

		public function delete($data){
			$this->db->delete('user_type_has_module', array('module_id' => $data['id']));
			$this->db->delete('module', array('id' => $data['id']));
		}
	}
?>