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

				$data['delivery_status'] = $getDeliveryStatusName->row('name');

				$data['timestamp'] = $getDeliveryStatusId->row('timestamp');

				$timestamp_mth = date_parse($data['timestamp']);

				switch($timestamp_mth['month']){
					case 1:
						$mth_str = "January";
						break;
					case 2:
						$mth_str = "February";
						break;
					case 3:
						$mth_str = "March";
						break;
					case 4:
						$mth_str = "April";
						break;
					case 5:
						$mth_str = "May";
						break;
					case 6:
						$mth_str = "June";
						break;
					case 7:
						$mth_str = "July";
						break;
					case 8:
						$mth_str = "August";
						break;
					case 9:
						$mth_str = "September";
						break;
					case 10:
						$mth_str = "October";
						break;
					case 11:
						$mth_str = "November";
						break;
					case 12:
						$mth_str = "December";
						break;
				}

				$data['time'] = date('H:i:s A', strtotime($data['timestamp']));

				$data['date'] = $mth_str . " " . $timestamp_mth['day'] . " " . $timestamp_mth['year'];

				if(isset($this->session->userdata['logged_in'])){
					$this->load->view('order_transcript', $data);
				}else{
					$this->load->view('track_order', $data);
				}
			}
		}
	}
?>