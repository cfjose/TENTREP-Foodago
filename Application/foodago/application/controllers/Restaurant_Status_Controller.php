<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Restaurant_Status_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('RestaurantStatus');
    	}

		public function index(){
			$this->load->view('add_restaurant_status');
		}

        public function newRestaurantStatus(){
			$this->form_validation->set_rules('name', 'Restaurant Status', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_restaurant_status');
			}else{
				$data = array('name' => $this->input->post('name'));

				$result = $this->RestaurantStatus->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant_status&mn=restaurant_status');
				}else{
					$this->load->view('add_restaurant_status', $message);
				}
			}
        }

        public function updateRestaurantStatus(){
        	
        }

        public function deleteRestaurantStatus(){
        	$this->form_validation->set_rules('id', 'Restaurant Status', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_restaurant_status');
        	}else{
        		$data = array('id' => $this->input->post('id'));

        		$result = $this->RestaurantStatus->delete($data);

				redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant_status&mn=restaurant_status');
        	}
        }
    }
?>
