<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Food_Items_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('FoodItem');
    	}

		public function index(){
			$this->load->view('add_food_items');
		}

        public function newFoodItem(){
			$this->form_validation->set_rules('name', 'Product Name', 'required|xss_clean');
			$this->form_validation->set_rules('price', 'Item Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('calorie_count', 'Calorie Count', 'trim|xss_clean');
			$this->form_validation->set_rules('restaurant_id' 'Restaurant', 'trim|required|xss_clean');
			$this->form_validation->set_rules('sub_category_id', 'Sub Category', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_food_items');
			}else{
				$data = array('name' => $this->input->post('name'),
							  'price' => $this->input->post('price'),
							  'calorie_count' => $this->input->post('calorie_count'),
							  'restaurant_id' => $this->input->post('restaurant_id'),
							  'sub_category_id' => $this->input->post('sub_category_id'));

				$result = $this->FoodItem->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=food_items&mn=food_items');
				}else{
					$this->load->view('add_food_items', $message);
				}
			}
        }

        public function updateFoodItem(){
        	
        }

        public function deleteFoodItem(){
        	$this->form_validation->set_rules('id', 'Food Item', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_food_items');
        	}else{
        		$data = array('restaurant_id' => $this->input->post('id'));

        		$result = $this->FoodItem->delete($data);

				redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=food_items&mn=food_items');	
        	}
        }
    }
?>
