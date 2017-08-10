<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sub_Category_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('SubCategory');
    	}

		public function index(){
			$this->load->view('add_sub_category');
		}

        public function newSubCategory(){
			$this->form_validation->set_rules('name', 'Subcategory Name', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_sub_category');
			}else{
				$data = array('name' => $this->input->post('name'));

				$result = $this->SubCategory->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=sub_category&mn=subcategories');
				}else{
					$this->load->view('add_sub_category', $message);
				}
			}
        }

        public function updateSubCategory(){
        	
        }

        public function deleteSubCategory(){
        	$this->form_validation->set_rules('id', 'Sub Category', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_sub_category');
        	}else{
        		$data = array('id' => $this->input->post('id'));

        		$result = $this->SubCategory->delete($data);

				redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=sub_category&mn=subcategories');
        	}
        }
    }
?>
