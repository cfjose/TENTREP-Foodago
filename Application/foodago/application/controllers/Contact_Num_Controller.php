<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact_Num_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('ContactNum');
    	}

		public function index(){
			$this->load->view('add_contact_num');
		}    	

        public function newContactNum(){
			$this->form_validation->set_rules('contact_num', 'Contact Number', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_contact_num');
			}else{
				$data = array('contact_num' => $this->input->post('contact_num'));

				$result = $this->ContactNum->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=contact_num&mn=contact_numbers');
				}else{
					$this->load->view('add_contact_num', $message);
				}
			}
        }

        public function updateContactNum(){
        	
        }

        public function deleteContactNum(){
        	$this->form_validation->set_rules('id', 'Contact Number', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_contact_num');
        	}else{
        		$data = array('id' => $this->input->post('id'));

        		$result = $this->ContactNum->delete($data);

        		redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=contact_num&mn=contact_numbers');
        	}	
        }
    }
?>
