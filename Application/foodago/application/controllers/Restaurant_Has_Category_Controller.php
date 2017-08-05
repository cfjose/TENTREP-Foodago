<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Restaurant_Has_Category_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('RestaurantHasCategory');
    	}

		public function index(){
			$this->load->view('add_restaurant_has_category');
		}

        public function newRestaurantHasCategory(){
			$this->form_validation->set_rules('restaurant_id', 'Restaurant', 'required|xss_clean');
			$this->form_validation->set_rules('category_id', 'Category', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_restaurant_has_category');
			}else{
				$data = array('restaurant_id' => $this->input->post('restaurant_id'),
							  'category_id' => $this->input->post('category_id'));

				$result = $this->RestaurantHasCategory->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=restaurant_has_category&mn=restaurant_categories');
				}else{
					$this->load->view('add_restaurant_has_category', $message);
				}
			}
        }
    }
?>
