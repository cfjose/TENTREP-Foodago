<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Feedback_Has_User_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('feedback');

    		$this->load->model('FeedbackHasUser');

    		$this->load->model('user');
    	}

		public function index(){
			$this->load->view('add_feedback_has_user');
		}

        public function newFeedbackHasUser(){
			$this->form_validation->set_rules('feedback_id', 'Feedback', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_id', 'User', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_feedback_has_user');
			}else{
				$data = array('feedback_id' => $this->input->post('feedback_id'),
							  'user_id' => $this->input->post('user_id'));

				$result = $this->FeedbackHasUser->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=feedback_has_user&mn=user_feedbacks');
				}else{
					$this->load->view('add_feedback_has_user', $message);
				}
			}
        }
    }
?>
