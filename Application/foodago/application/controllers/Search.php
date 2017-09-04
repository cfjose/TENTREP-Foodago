<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Search extends CI_Controller{
		public function index(){

		}

		public function rfSearch(){
            $this->form_validation->set_rules('q', 'Search Keyword', 'required|xss_clean');

            if($this->form_validation->run() == FALSE){
               redirect(base_url() . 'index.php/main?page_view=default_view');
            }else{
                $this->db->select('*');
                $this->db->from('restaurant');
                $this->db->like('name', $this->input->post('q'));

                $getRestaurantsOnQuery = $this->db->get();

                $this->db->select('*');
                $this->db->from('food_items');
                $this->db->like('name', $this->input->post('q'));

                $getFoodItemsOnQuery = $this->db->get();

                $this->db->select('*');
                $this->db->from('category');
                $this->db->like('name', $this->input->post('q'));

                $getCategoriesOnQuery = $this->db->get();

                $data = array('food_items' => $getFoodItemsOnQuery->result(),
                    'restaurants' => $getRestaurantsOnQuery->result(),
                    'categories' => $getCategoriesOnQuery->result());

                $this->load->view('main', $data);
            }
		}
	}
?>