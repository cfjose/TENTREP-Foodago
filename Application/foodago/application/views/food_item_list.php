<?php
	if(isset($_GET['restaurant_name'])){
		$restaurant_name = $_GET['restaurant_name'];
		echo "<h3>" . $restaurant_name . "</h3><br/>";

		$query = $this->restaurant->getResIdFromRes($restaurant_name);

		$resultResId = $query->row()->id;

		$query = $this->restaurant->getRestaurantSubCategory($resultResId);

		foreach($query->result() as $row){
			$sub_category_id = $row->sub_category_id;

			$query = $this->SubCategory->getSubCategoryName($sub_category_id);
			$result = $query->row()->name;
			echo "<br><br>
			 	  <br><br>
			 	  <div class='subcategory-pane'>";

			echo "<h4 class='sub-category-names'>" . $result . "</h4><br/>";

			$data = array('restaurant_id' => $resultResId,
							'sub_category_id' => $sub_category_id);

			$query = $this->FoodItem->getFoodItemInfo($data);

			if($query->num_rows() == 0){
				echo "<h3 class='no-avail'>No Products Available</h3>";
			}else{
				foreach($query->result() as $row){
					echo "<div class='col-lg-6'>
	                    	<div class='thumbnail'>";
	                    	$file_name = strtolower(preg_replace('/[^A-Za-z0-9\-.]/', '', $row->name));
	                    	if(file_exists(FCPATH . '/assets/images/main/food/' . $file_name . '.jpg')){
	                    		echo "<img src='".base_url()."/assets/images/main/food/".$file_name.".jpg' alt='' width='320px' height='200px'>";
	                    	}else{
								echo "<img src='http://placehold.it/320x150' alt=''>";
	                    	}
	                        	echo "<div class='caption'>";
	                            	echo "<h5 class='pull-right'>&#x20B1 " . $row->price . "</h5>";
	                            	echo "<h5><a href='#'>" . $row->name . "</a></h5>";
	                            	echo "<h5>Calorie Count :  " . ($row->calorie_count == NULL ? "Not Available" : $row->calorie_count) . "</h5>";
	                            	echo "<a class='btn btn-primary' target='_blank' style='width:100%' href='#' name='add_cart'>Add to tray</a>
	                            	</div>";
	                        echo "<div class='ratings'>";
                                $query = $this->feedback->getFoodItemFeedbackCount($row->id);
	                            echo "<p class='pull-right'>" . $query->num_rows() . " Reviews</p>";
	                            echo "<p>
	                            		<span class='glyphicon glyphicon-star'></span>
	                                	<span class='glyphicon glyphicon-star'></span>
	                                	<span class='glyphicon glyphicon-star'></span>
	                                	<span class='glyphicon glyphicon-star'></span>
	                                	<span class='glyphicon glyphicon-star'></span>
	                            	  </p>
	                        	  </div>
	                    	  </div>
	                	  </div>";
				}
			}
			echo "</div>";
		}
	}
	echo "
			<script>
				$(document).ready(function(){
					$('.add_cart'),click(function(){
						var id = $(this).data('foodItemId');
						var name = $(this).data('foodItemName');
						var price = $(this).data('foodItemPrice');
						var quantity = $('#' + food_item_id).val();
						if(quantity != '' && quantity > 0)
						{
							$.ajax({
								url:".base_url()."AddToCart/add,
								method:'POST',
								data:{id:id, name:name, price:price, quantity:quantity},
								success:function(data){
									alert('Products are added into the cart');
									$('.food-tray').html(data);
									$('#' + id).val('');
								}
							})
						}
						else
						{
							alert('Please enter a quantity');
						}
					});
				})
			</script>
		";
?>