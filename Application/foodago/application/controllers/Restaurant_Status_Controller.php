<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Add_Restaurant_Status extends CI_Controller{
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
    }
?>
