<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback extends CI_Model{
		public function getAllFeedback(){
            $this->db->select('*');
            $this->db->from('feedback');

            $query = $this->db->get();
            return $query;
        }

        public function getFeedbackById($data){
        	$this->db->select('*');
        	$this->db->from('feedback');
        	$this->db->where("id ='" . $data . "'");

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
        
        public function update($data){

        }

        public function delete($data){
            $this->db->delete('feedback_has_user', array('feedback_id' => $data['id']));
            $this->db->delete('feedback', array('id' => $data['id']));
        }

        public function  fetch_data_feedback(){
            $this->db->select('*');
            $this->db->from('feedback_has_user');
            $this->db->order_by('feedback_id', 'DESC');

            $query = $this->db->get();
            return $query;
        }

	}
?>