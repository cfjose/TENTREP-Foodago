<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class TrackOrder extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('order');

			$this->load->model('DeliveryStatus');
		}

		public function index(){
			$this->load->view('track_order');
		}

		public function getOrderDeliveryStatus(){
			$this->form_validation->set_rules('tracking_number', 'Order Tracking Number', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('track_order');
			}else{
				$data = array('tracking_number' => $this->input->post('tracking_number'));

				$getDeliveryStatusId = $this->order->getOrderStatus($data);

				$getDeliveryStatusName = $this->DeliveryStatus->getDeliveryStatus($getDeliveryStatusId->row('delivery_status_id'));

				$_SESSION['delivery_status'] = $getDeliveryStatusName->row('name');

				$_SESSION['tracking_number'] = $data['tracking_number'];

				$_SESSION['timestamp'] = $getDeliveryStatusId->row('timestamp');



				$this->load->view('track_order', $_SESSION);
			}
		}
	}
?>