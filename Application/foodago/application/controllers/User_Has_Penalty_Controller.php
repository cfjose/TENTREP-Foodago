<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Add_User_Has_Penalty extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('UserHasPenalty');
    	}

		public function index(){
			$this->load->view('add_user_has_penalty');
		}

        public function newUserHasPenalty(){
			$this->form_validation->set_rules('penalty_id', 'Penalty', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_id', 'User', 'trim|required|xss_clean');
			$this->form_validation->set_rules('order_id', 'Order', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_user_has_penalty');
			}else{
				$data = array('penalty_id' => $this->input->post('penalty_id'),
							  'user_id' => $this->input->post('user_id'),
							  'order_id' => $this->input->post('order_id'));

				$result = $this->UserHasPenalty->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=user_has_penalty&mn=user_penalties');
				}else{
					$this->load->view('add_user_has_penalty', $message);
				}
			}
        }
    }
?>
