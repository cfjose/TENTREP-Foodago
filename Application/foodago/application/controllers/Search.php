<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('category');

			$this->load->model('restaurant');
		}

		public function index(){

		}

		public function rfSearch(){
            $this->form_validation->set_rules('q', 'Search Keyword', 'required|xss_clean');

            if($this->form_validation->run() == FALSE){
                $this->db->select('*');
                $this->db->from('restaurant');
                $this->db->like('name', $this->input->post['q']);

                $getRestaurantsOnQuery = $this->db->get();

                $this->db->select('*');
                $this->db->from('food_items');
                $this->db->like('name', $this->input->post['q']);

                $getFoodItemsOnQuery = $this->db->get();

                $data = array('food_items' => $getFoodItemsOnQuery,
                    'restaurants' => $getRestaurantsOnQuery);

                var_dump($data);
            }
		}
	}
?>