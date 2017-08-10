<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Feedback_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('feedback');
    	}

		public function index(){
			$this->load->view('add_feedback');
		}

        public function newFeedback(){
			$this->form_validation->set_rules('remark', 'Feedback Description', 'required|xss_clean');
			$this->form_validation->set_rules('rating', 'Feedback Rating', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_feedback');
			}else{
				$data = array('remark' => $this->input->post('remark'),
							  'rating' => $this->input->post('rating'));

				$result = $this->feedback->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=feedback&mn=feedbacks');
				}else{
					$this->load->view('add_feedback', $message);
				}
			}
        }

        public function updateFeedback(){
        	
        }

        public function deleteFeedback(){
        	$this->form_validation->set_rules('id', 'Feedback Reference', 'trim|required|xss_clean');

        	if($this->form_validation->run() == FALSE){

        	}else{
        		$data = array('id' => $this->input->post('id'));

        		$result = $this->feedback->delete($data);

        		redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=feedback&mn=feedbacks');
        	}
        }
    }
?>
