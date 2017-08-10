<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Category_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('category');
    	}

		public function index(){
			$this->load->view('add_category');
		}    	

        public function newCategory(){
			$this->form_validation->set_rules('name', 'Category Name', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_category');
			}else{
				$data = array('name' => $this->input->post('name'));

				$result = $this->category->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=category&mn=categories');
				}else{
					$this->load->view('add_category', $message);
				}
			}
        }

        public function updateCategory(){
        	
        }

        public function deleteCategory(){
        	$this->form_validation->set_rules('category_id', 'Category', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_category');
        	}else{
        		$data = array('id' => $this->input->post('category_id'));

        		$result = $this->category->delete($data);

                redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=category&mn=categories');
        	}
        }
    }
?>
