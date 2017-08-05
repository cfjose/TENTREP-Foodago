<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Order_Has_Food_Items_Controller extends CI_Controller{
    	public function __construct(){
    		parent::__construct();

    		$this->load->model('OrderHasFoodItem');
    	}

		public function index(){
			$this->load->view('add_order_has_food_items');
		}

        public function newOrderHasFoodItems(){
			$this->form_validation->set_rules('order_id', 'Order', 'trim|required|xss_clean');
			$this->form_validation->set_rules('food_item_qty', 'Food Item Quantity', 'trim|required|xss_clean');
			$this->form_validation->set_rules('food_items_id', 'Food Item', 'trim|required|xss_clean');
			$this->form_validation->set_rules('order_has_user_user_id', 'Owned By', 'required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->load->view('add_order_has_food_items');
			}else{
				$data = array('order_id' => $this->input->post('order_id'),
							  'food_item_qty' => $this->input->post('food_item_qty'),
							  'food_items_id' => $this->input->post('food_items_id'),
							  'order_has_user_user_id' => $this->input->post('order_has_user_user_id'));

				$result = $this->OrderHasFoodItem->insert($data);

				if($result == TRUE){
					redirect(base_url() . 'index.php/admin?page_view=admin_table&tn=order_has_food_items&mn=order_food_items');
				}else{
					$this->load->view('add_order_has_food_items', $message);
				}
			}
        }
    }
?>
