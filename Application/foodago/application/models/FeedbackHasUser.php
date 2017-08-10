<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FeedbackHasUser extends CI_Model{
		public function getUserFeedback($data){
            $this->db->select('*');
            $this->db->from('feedback_has_user');
            $this->db->where("user_id ='" . $data . "'");

            $query = $this->db->get();
            return $query;
        }

        public function insert($data){
            $this->db->insert('feedback_has_user', $data);

            if($this->db->affected_rows > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function update($data){

        }

        public function delete($data){

        }
	}
?>