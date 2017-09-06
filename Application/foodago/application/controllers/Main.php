<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{
		public function __construct(){
			parent::__construct();

			$this->load->model('category');

			$this->load->model('restaurant');

			$this->load->model('FoodItem');

			$this->load->model('FoodItemHasFeedback');

			$this->load->model('RestaurantHasCategory');

			$this->load->model('RestaurantHasSubCategory');

			$this->load->model('SubCategory');

            $this->load->model('feedback');

            $this->load->model('order');
		}

		public function index(){
			if($this->session->userdata['user_type'] == 'System Administrator' || $this->session->userdata['user_type'] == 'Aggregator' || $this->session->userdata['user_type'] == 'Restaurant Owner'){
				// LOAD AdminLTE DASHBOARD
			}else{
				$this->load->view('main');
			}
		}

		public function add(){
			if($this->input->post('data') == ''){
				$data = $this->input->post('item_id');
				$getFoodItemById = $this->FoodItem->getFoodItemById($data);

				if(in_array($getFoodItemById->row('name'), $this->session->userdata['food_tray']['item_name'])){
					$getItemIndex = array_search($getFoodItemById->row('name'), $this->session->userdata['food_tray']['item_name']);

					$this->session->userdata['food_tray']['item_qty'][$getItemIndex]++;
					$this->session->userdata['food_tray']['sub_amt'][$getItemIndex] = $_SESSION['food_tray']['item_price'][$getItemIndex] * $_SESSION['food_tray']['item_qty'][$getItemIndex];
				}else{
					$this->session->userdata['food_tray']['item_id'][] = $getFoodItemById->row('id');
					$this->session->userdata['food_tray']['item_name'][] = $getFoodItemById->row('name');
					$this->session->userdata['food_tray']['item_price'][] = floatval($getFoodItemById->row('price'));
					$this->session->userdata['food_tray']['item_cal'][] = $getFoodItemById->row('calorie_count');
					$this->session->userdata['food_tray']['item_resid'][] = $getFoodItemById->row('restaurant_id');
					$this->session->userdata['food_tray']['item_subcat_id'][] = $getFoodItemById->row('sub_category_id');
					$this->session->userdata['food_tray']['item_qty'][] = 1;
					$this->session->userdata['food_tray']['sub_amt'][] = floatval($getFoodItemById->row('price'));
					/*$this->session->userdata['food_tray']['order_sharing'] = 0;
					$this->session->userdata['food_tray']['order_sharing_code'] = '';*/
					$this->session->userdata['food_tray']['delivery_fee'] = 0.00;
					$this->session->userdata['food_tray']['total_amt'] = 0.00;
				}
			}
		}

		public function changeShareState(){
			if($this->input->post('data') == ''){
				$this->session->userdata['food_tray']['order_sharing_state'] = $this->input->post('share_st');
				$this->session->userdata['food_tray']['order_sharing_code'] = $this->input->post('share_id');

				redirect(base_url() . 'index.php/main');
			}else{
				echo "An error has occured while trying to fetch order sharing state. Please try again at a moment";
			}
		}

		public function updateItemQty(){

		}

		public function deleteItem(){
			$this->form_validation->set_rules('item_id', 'Item', 'trim|required|xss_clean');

			unset($this->session->userdata['food_tray']['item_id'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_name'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_price'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_cal'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_resid'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_subcat_id'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['item_qty'][$_POST['item_id']]);
			unset($this->session->userdata['food_tray']['sub_amt'][$_POST['item_id']]);

			return;
		}
	}
?>