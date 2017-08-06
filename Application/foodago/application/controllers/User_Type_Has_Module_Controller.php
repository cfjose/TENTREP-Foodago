<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_Type_Has_Module_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('UserTypeHasModule');
    	}

		public function index(){
			$this->load->view('add_user_type_has_module');
		}

        public function newUserTypeHasModule(){
			$this->form_validation->set_rules('user_type_id', 'User Type', 'required|xss_clean');
			$this->form_validation->set_rules('module_id', 'Module', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_user_type_has_module');
			}else{
				$data = array('user_type_id' => $this->input->post('user_type_id'),
							  'module_id' => $this->input->post('module_id'));

				$result = $this->UserTypeHasModule->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=user_type_has_module&mn=user_type_modules');
				}else{
					$this->load->view('add_user_type_has_module', $message);
				}
			}
        }
    }
?>
