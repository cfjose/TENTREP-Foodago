<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Restaurant_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('restaurant');
    	}

		public function index(){
			$this->load->view('add_restaurant');
		}

        public function newRestaurant(){
			$this->form_validation->set_rules('name', 'Restaurant Name', 'required|xss_clean');
			$this->form_validation->set_rules('restaurant_status_id', 'Restaurant Status', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_restaurant');
			}else{
				$data = array('name' => $this->input->post('name'),
							  'restaurant_status_id' => $this->input->post('restaurant_status_id'));

				$result = $this->restaurant->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant&mn=restaurants');
				}else{
					$this->load->view('add_restaurant', $message);
				}
			}
        }

        public function updateRestaurant(){

        }

        public function deleteRestaurant(){
        	$this->form_validation->set_rules('id', 'Restaurant', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_restaurant');
        	}else{
        		$data = array('id' => $this->input->post('id'));
        		
        		$deleteRestaurantFoodItems = $this->FoodItem->deleteByRestaurant($data);

        		if($deleteRestaurantFoodItems == TRUE){
        			$result = $this->restaurant->delete($data);

					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant&mn=restaurants');
        		}else{
        			$data['message'] = "An error has occurred while trying to delete restaurant. Operation not performed";
        			$this->load->view('delete_restaurant', $data);
        		}
        	}
        }
    }
?>
