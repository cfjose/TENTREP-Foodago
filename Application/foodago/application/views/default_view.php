<div class="category-nav"> <br>
	<h4> Categories </h4><br/>
	<div class="panel-group">
		<?php
			$query = $this->category->getCategoryNames();

			foreach ($query->result() as $row){
				$name = $row->name;

				$categoryId = $this->category->getCategoryId($name);

				// GET NUMBER OF RESTAURANT PER CATEGORY, IF 0, DO NOT PRINT CATEGORY
				$query = $this->RestaurantHasCategory->getRestaurantId($categoryId);
				$totalResCount = $query->num_rows();

				if($totalResCount == 0){
					// DO NOT PRINT CATEGORY
				}else{
					$trimmed_str_name = str_replace(' ', '', $name);
					echo "<div class='panel panel-default'>";
						echo "<a data-toggle='collapse' href='#".$trimmed_str_name."'><div class='panel-heading' style='background-color:#ff6f00; color:white'>";
						echo "<h4 class='panel-title'>" . $name . "</h4></div></a>";

				      	echo "<div id='".$trimmed_str_name."' class='panel-collapse collapse'>";
				      		echo "<ul class='list-group'>";

								$query = $this->RestaurantHasCategory->getRestaurantId($categoryId);

								foreach($query->result() as $row){
									$result = $this->restaurant->getRestaurantName($row->restaurant_id);
									$row = $result->row()->name;

									echo "<li class='list-group-item' style='background-color: #fff9c4;'><a href='" . base_url() . "index.php/main?page_view=default_view&restaurant_name=". $row ."'>" . $row . "</a></li>";
								}
							echo "</ul>";
						echo "</div>";
					echo "</div>";
				}
            }
		?>
	</div>
</div>
<div class="recent-searches-nav"> <br>
<div class="col-lg-4">
	<h3>Recent Searches</h3>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php
				if(isset($_GET['restaurant_name'])){
					if(in_array($_GET['restaurant_name'], $this->session->userdata['recent_searches'])){
						// DO NOTHING
					}else{
						$this->session->userdata['recent_searches'][] = $_GET['restaurant_name'];
					}

					for($i = 0; $i < count($this->session->userdata['recent_searches']); $i++){
						echo "<a href='" . base_url() . "index.php/main?page_view=default_view&restaurant_name=". $this->session->userdata['recent_searches'][$i] ."'>" . $this->session->userdata['recent_searches'][$i] . "</a>";
						echo "<hr class='hr0'/>";
					}				
				}
			?>
		</div>
	</div>
	</div>
</div>
</div>
<div class="col-lg-4" style="margin-left: 0%">
<div class="food-item-list"> <br>
	<?php
		if(isset($_GET['restaurant_name'])){
			$this->load->view('food_item_list',$_GET['restaurant_name']);
		}else{
			// CREATE ANOTHER LAYOUT WITH MESSAGE 'SELECT A CATEGORY TO START' AND LOAD INTO DIV
		}
	?>
</div>