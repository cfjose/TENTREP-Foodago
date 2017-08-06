<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* This controller is for add to cart feature
	*/
	class AddToCart extends CI_Controller
	{
		
		public function __construct(){
			parent::__construct();

            $this->load->model('FoodItem');
		}

		function index()
		{
			$this->load->model("FoodItem");
			$data["food_items"] = $this->FoodItem->getFoodItemInfo();
		}

		function add()
		{
			$this->load->library("cart");
			$data = array(
				"id" => $_POST["id"],
				"name" => $_POST["name"],
				"qty" => $_POST["quantity"],
				"price" => $_POST["price"],
			);
			$this->cart->insert($data); //return row id.
		}

		function view(){
			$this->load->library("cart");
			$output = '';
			$output .= '
				<h3>Cart</h3><br/>
				<div class="table-responsive">
					<div align="right">
						<button type="button" id="clear_cart" class="btn btn-warning">
						Clear cart</button>
					</div><br/>
					<table class="table table-bordered">
						<tr>
							<th width="40%">Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>
							<th width="15%">Total</th>
							<th width="15%">Action</th>
						</tr>
			';
			$count = 0;
			foreach ($$this->cart->contents() as $items {
				$count++;
				$output .='
					<tr>
						<td>'.$items["name"].'</td>
						<td>'.$items["qty"].'</td>
						<td>'.$items["price"].'</td>
						<td>'.$items["subtotal"].'</td>
						<td><button type = "button" name="remove" class="btn btn-danger
						btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button</td>
					</tr>
				';
			}

			$output .='
				<tr>
				<td colspan="4" align="right"> Total </td>
				<td>'.$this->cart->total().'</td>
				</tr>
			</table>

			</div>
			';

			if($count == 0)
			{
				$output = '<h3 align="center">Cart is empty</h3>';
			}
			return $output;
		}
	}
?>