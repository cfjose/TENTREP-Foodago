<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Add_Sub_Category extends CI_Controller{
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
    }
?>
