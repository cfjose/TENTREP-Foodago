<?php
	if(isset($_GET['restaurant_name'])){
		$restaurant_name = $_GET['restaurant_name'];
		echo "<h3>" . $restaurant_name . "</h3><br/>";

		$query = $this->restaurant->getRestaurantIdFromRestaurant($restaurant_name);

		$resultResId = $query->row('id');

		$query = $this->RestaurantHasSubCategory->getRestaurantSubCategory($resultResId);

		foreach($query->result() as $row){
			$sub_category_id = $row->sub_category_id;

			$query = $this->SubCategory->getSubCategoryName($sub_category_id);
			$result = $query->row()->name;
			echo "<div class='subcategory-pane'>";
				echo "<h4 class='sub-category-names'>" . $result . "</h4>";

				$data = array('restaurant_id' => $resultResId,
								'sub_category_id' => $sub_category_id);

				$query = $this->FoodItem->getFoodItemInfo($data);

				if($query->num_rows() == 0){
					echo "<h3 class='no-avail'>No Products Available</h3>";
				}else{
					foreach($query->result() as $row){
						echo "<div class='col-lg-7'>";
		                    echo "<div class='thumbnail'>";
		                    	$file_name = strtolower(preg_replace('/[^A-Za-z0-9\-.]/', '', $row->name));
		                    	/*if(file_exists(FCPATH . '/assets/images/main/food/' . $file_name . '.jpg')){
		                    		echo "<img src='".base_url()."/assets/images/main/food/".$file_name.".jpg' alt='' width='320px' height='100px'>";
		                    	}else{
									echo "<img src='http://placehold.it/320x150' alt=''>";
		                    	}*/
		                    	echo "<img src='http://placehold.it/320x150' alt=''>";
	                        	echo "<div class='caption'>";
	                            	echo "<h5 class='pull-right'>&#x20B1 " . $row->price . "</h5>";
	                            	echo "<h5><a href='#'>" . $row->name . "</a></h5>";
	                            	echo "<h5>Calorie Count :  " . ($row->calorie_count == NULL ? "Not Available" : $row->calorie_count) . "</h5>";
	                            	echo "<button class='btn btn-primary' style='width:100%' id='ref_item' onclick=addProductToTray(".$row->id.")>Add to Tray</button>";
	                        	echo "</div>";
		                        /*echo "<div class='ratings'>";
	                                $query = $this->FoodItemHasFeedback->getAllFoodItemFeedback($row->id);
		                            echo "<p class='pull-right'>" . $query->num_rows() . " Reviews</p>";
		                            echo "<p>";
			                            echo "<span class='glyphicon glyphicon-star'></span>";
			                            echo "<span class='glyphicon glyphicon-star'></span>";
			                            echo "<span class='glyphicon glyphicon-star'></span>";
			                            echo "<span class='glyphicon glyphicon-star'></span>";
			                            echo "<span class='glyphicon glyphicon-star'></span>";
		                            echo "</p>";
	                        	echo "</div>";*/
	                    	echo "</div>";
	            	  	echo "</div>";
					}
				}
			echo "</div>";
		}
	}
?>