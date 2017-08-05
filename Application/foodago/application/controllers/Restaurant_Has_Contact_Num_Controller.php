<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Restaurant_Has_Contact_Num_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('RestaurantHasContactNum');
    	}

		public function index(){
			$this->load->view('add_restaurant_has_contact_num');
		}

        public function newRestaurantHasContactNum(){
			$this->form_validation->set_rules('restaurant_id', 'Restaurant', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contact_num_id', 'Contact Number', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_restaurant_has_contact_num');
			}else{
				$data = array('restaurant_id' => $this->input->post('restaurant_id'),
							  'contact_num_id' => $this->input->post('contact_num_id'));

				$result = $this->RestaurantHasContactNum->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant_has_contact_num&mn=restaurant_contact_numbers');
				}else{
					$this->load->view('add_restaurant_has_contact_num', $message);
				}
			}
        }
    }
?>
