<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback extends CI_Model{
		public function getFoodItemFeedbackCount($data){
            $this->db->select('feedback_id');
            $this->db->from('food_items_has_feedback');
            $this->db->where("food_items_id ='" . $data . "'");

            $query = $this->db->get();
            return $query;
        }
	}
?>