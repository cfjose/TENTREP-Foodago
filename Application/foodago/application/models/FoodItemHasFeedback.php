<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FoodItemHasFeedback extends CI_Model{
		public function getAllFoodItemFeedback($data){
            $this->db->select('feedback_id');
            $this->db->from('food_items_has_feedback');
            $this->db->where("food_items_id ='" . $data . "'");

            $query = $this->db->get();
            return $query;
        }

        public function insert($data){
            $this->db->insert('food_items_has_feedback', $data);

            if($this->db->affected_rows > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
	}
?>