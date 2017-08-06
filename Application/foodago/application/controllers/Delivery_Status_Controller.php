<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Delivery_Status_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('DeliveryStatus');
    	}

		public function index(){
			$this->load->view('add_delivery_status');
		}

        public function newDeliveryStatus(){
			$this->form_validation->set_rules('name', 'Delivery Status Name', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_delivery_status');
			}else{
				$data = array('name' => $this->input->post('name'));

				$result = $this->DeliveryStatus->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=delivery_status&mn=delivery_status');
				}else{
					$this->load->view('add_delivery_status', $message);
				}
			}
        }
    }
?>
