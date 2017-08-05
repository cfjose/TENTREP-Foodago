<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_Type_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('UserType');
    	}

		public function index(){
			$this->load->view('add_user_type');
		}

        public function newUserType(){
			$this->form_validation->set_rules('name', 'User Type', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_user_type');
			}else{
				$data = array('name' => $this->input->post('name'));

				$result = $this->UserType->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=user_type&mn=user_types');
				}else{
					$this->load->view('add_user_type', $message);
				}
			}
        }
    }
?>
