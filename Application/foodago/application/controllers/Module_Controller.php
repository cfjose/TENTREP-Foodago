<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Add_Module extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('module');
    	}

		public function index(){
			$this->load->view('add_module');
		}

        public function newModule(){
			$this->form_validation->set_rules('name', 'Module Name', 'required|xss_clean');
			$this->form_validation->set_rules('dbt_name', 'From Database Table', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_module');
			}else{
				$data = array('name' => $this->input->post('name'),
							  'dbt_name' => $this->input->post('dbt_name'));

				$result = $this->module->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=module&mn=modules');
				}else{
					$this->load->view('add_module', $message);
				}
			}
        }
    }
?>
