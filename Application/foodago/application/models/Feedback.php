<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback extends CI_Model{
		public function getAllFeedback(){
            $this->db->select('*');
            $this->db->from('feedback');

            $query = $this->db->get();
            return $query;
        }

        public function insert($data){
        	$this->db->insert('feedback', $data);

			if($this->db->affected_rows > 0){
				return TRUE;
			}else{
				return FALSE;
			}
        }
	}
?>