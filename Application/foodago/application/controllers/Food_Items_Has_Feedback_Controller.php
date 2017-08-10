<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Food_Items_Has_Feedback_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('FoodItemHasFeedback');
    	}

		public function index(){
			$this->load->view('add_food_items_has_feedback');
		}

        public function newFoodItemHasFeedback(){
			$this->form_validation->set_rules('food_items_id', 'Food Item', 'trim|required|xss_clean');
			$this->form_validation->set_rules('feedback_id', 'Feedback', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_food_items_has_feedback');
			}else{
				$data = array('food_items_id' => $this->input->post('food_items_id'),
							  'feedback_id' => $this->input->post('feedback_id'));

				$result = $this->FoodItemHasFeedback->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=food_items_has_feedback&mn=food_items_feedback');
				}else{
					$this->load->view('add_food_items_has_feedback', $message);
				}
			}
        }

        public function updateFoodItemHasFeedback(){
        	
        }

        public function deleteFoodItemHasFeedback(){
        	
        }
    }
?>
