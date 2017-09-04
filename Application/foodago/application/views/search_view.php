<script>
	function addProductToTray(data){
		var item_id = data;
		$.ajax({
			type: "POST",
			url: 'Main/add',
			data: {
				item_id: item_id
			},

			success: function(data){	
				console.log("OK");
			}
		});
		$('.panel-body').load(' .panel-body');
	}
</script>
<div class="col-md-12 grid">
	<h4><i class="fa fa-coffee"></i> Food Items</h4>
	<hr class="grid-divider"/>
	<?php
		$counter = 0;
		$count_food_items = count($food_items);

		if($count_food_items == 0){
			echo "<h4 class='no-avail-list'>No Food Item Results Found</h4>";
		}else{
			while($counter < $count_food_items){
				echo "<div class='col-lg-6'>";
            		echo "<div class='thumbnail'>";
            			$file_name = strtolower(preg_replace('/[^A-Za-z0-9\-.]/', '', $food_items[$counter]->name));
		            	/*if(file_exists(FCPATH . '/assets/images/main/food/' . $file_name . '.jpg')){
		            		echo "<img src='".base_url()."/assets/images/main/food/".$file_name.".jpg' alt='' width='320px' height='100px'>";
		            	}else{
							echo "<img src='http://placehold.it/320x150' alt=''>";
		            	}*/
		            	echo "<img src='http://placehold.it/320x150' alt=''>";
		            	echo "<div class='caption'>";
		                	echo "<h5 class='pull-right'>&#x20B1 " . $food_items[$counter]->price . "</h5>";
		                	echo "<h5><a href='#'>" . $food_items[$counter]->name . "</a></h5>";
		                	echo "<h5>Calorie Count :  " . ($food_items[$counter]->calorie_count == NULL ? "Not Available" : $food_items[$counter]->calorie_count) . "</h5>";
		                	echo "<button class='btn btn-primary' style='width:100%' id='ref_item' onclick=addProductToTray(".$food_items[$counter]->id.")>Add to Tray</button>";
		            	echo "</div>";
		            	echo "<div class='ratings'>";
		                    $query = $this->FoodItemHasFeedback->getAllFoodItemFeedback($food_items[$counter]->id);
		                    $total_rating = 0; $count = 0;
		                    echo "<p class='pull-right'><a href=".base_url()."index.php/Feedback_Controller?refid=".$food_items[$counter]->id.">" . $query->num_rows() . " Reviews</a></p>";
		                    echo "<p>";
			                    foreach($query->result() as $row){
			                    	$query = $this->feedback->getFeedbackById($row->feedback_id);
			                    	$total_rating += $query->row('rating');
			                    }

			                    while($count < $total_rating){
			                    	echo "<span class='glyphicon glyphicon-star fill'></span>";
			                    	$count++;
			                    }

			                    $count = 0;
			                    while($count < 5-$total_rating){
			                    	echo "<span class='glyphicon glyphicon-star empty'></span>";
			                    	$count++;
			                    }
		                    echo "</p>";
		            	echo "</div>";
	            	echo "</div>";
            	echo "</div>";
            	$counter++;
			}
		}
	?>
</div>
<div class="col-md-12 grid">
	<h4><i class="fa fa-circle-o"></i> Categories</h4>
	<hr class="grid-divider"/>
	<?php
		$counter = 0;
		$count_categories = count($categories);

		if($count_categories == 0){
			echo "<h4 class='no-avail-list'>No Category Results Found</h4>";
		}else{
			while($counter < $count_categories){
				echo "<div class='col-lg-6'>";
            		echo "<div class='thumbnail'>";
            			$file_name = strtolower(preg_replace('/[^A-Za-z0-9\-.]/', '', $categories[$counter]->name));
		            	/*if(file_exists(FCPATH . '/assets/images/main/food/' . $file_name . '.jpg')){
		            		echo "<img src='".base_url()."/assets/images/main/food/".$file_name.".jpg' alt='' width='320px' height='100px'>";
		            	}else{
							echo "<img src='http://placehold.it/320x150' alt=''>";
		            	}*/
		            	echo "<img src='http://placehold.it/320x150' alt=''>";
		            	echo "<div class='caption'>";
		                	echo "<h5>" . $categories[$counter]->name . "</h5>";
		                	echo "<a class='btn btn-primary' style='width:100%' id='ref_item' href=".base_url()."index.php/main>Visit</a>";
		            	echo "</div>";
	            	echo "</div>";
            	echo "</div>";
				$counter++;
			}
		}
	?>
</div>
<div class="col-md-12 grid">
	<h4><i class="fa fa-cutlery"></i> Restaurants</h4>
	<hr class="grid-divider"/>
	<?php
		$counter = 0;
		$count_restaurants = count($restaurants);

		if($count_restaurants == 0){
			echo "<h4 class='no-avail-list'>No Restaurant Results Found</h4>";
		}else{
			while($counter < $count_restaurants){
				echo "<div class='col-lg-6'>";
            		echo "<div class='thumbnail'>";
            			$file_name = strtolower(preg_replace('/[^A-Za-z0-9\-.]/', '', $restaurants[$counter]->name));
		            	/*if(file_exists(FCPATH . '/assets/images/main/food/' . $file_name . '.jpg')){
		            		echo "<img src='".base_url()."/assets/images/main/food/".$file_name.".jpg' alt='' width='320px' height='100px'>";
		            	}else{
							echo "<img src='http://placehold.it/320x150' alt=''>";
		            	}*/
		            	echo "<img src='http://placehold.it/320x150' alt=''>";
		            	echo "<div class='caption'>";
		                	echo "<h5>" . $restaurants[$counter]->name . "</h5>";
		                	echo "<a class='btn btn-primary' style='width:100%' id='ref_item' href='".base_url()."index.php/main?restaurant_name=".$restaurants[$counter]->name."'>Visit</a>";
		            	echo "</div>";
	            	echo "</div>";
            	echo "</div>";
				$counter++;
			}
		}
	?>
</div>