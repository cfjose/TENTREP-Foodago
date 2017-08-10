<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penalty_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('penalty');
    	}

		public function index(){
			$this->load->view('add_penalty');
		}

        public function newPenalty(){
			$this->form_validation->set_rules('amount', 'Penalty Amount', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_penalty');
			}else{
				$data = array('amount' => $this->input->post('amount'));

				$result = $this->penalty->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=penalty&mn=penalty');
				}else{
					$this->load->view('add_penalty', $message);
				}
			}
        }

        public function updatePenalty(){
        	
        }

        public function deletePenalty(){
        	$this->form_validation->set_rules('id', 'Penalty', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		$this->load->view('delete_penalty');
        	}else{
        		$data = array('id' => $this->input->post('id'));

        		$result = $this->penalty->delete($data);

        		redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=penalty&mn=penalty');
        	}
        }
    }
?>
