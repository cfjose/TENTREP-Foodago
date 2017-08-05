<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Add_Order_Has_User extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('OrderHasUser');
    	}

		public function index(){
			$this->load->view('add_order_has_user');
		}

        public function newOrderHasUser(){
			$this->form_validation->set_rules('user_id', 'User', 'trim|required|xss_clean');
			$this->form_validation->set_rules('indv_amt', 'Total Amount', 'trim|required|xss_clean');
			$this->form_validation->set_rules('order_id', 'Order', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_order_has_user');
			}else{
				$data = array('user_id' => $this->input->post('user_id'),
							  'indv_amt' => $this->input->post('indv_amt'),
							  'order_id' => $this->input->post('order_id'));

				$result = $this->OrderHasUser->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=order_has_user&mn=user_orders');
				}else{
					$this->load->view('add_order_has_user', $message);
				}
			}
        }
    }
?>
