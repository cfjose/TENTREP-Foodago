	<div class="row">
	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	      	<h3>
	      		<?php
	      			$query = $this->order->getNeworders();
	      			echo $query->num_rows();
	      		?>
	      	</h3>
	        <p>New Orders</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-green">
	      <div class="inner">
	        <h3>
	          <?php
	            $query = $this->user->getCustomerNum();
	            echo $query->num_rows();
	          ?>
	        </h3>
	        <p>User Registrations</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-person-add"></i>
	      </div>
	      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-orange">
	      <div class="inner">
	        <h3>
	          <?php
	          	$data = 'Pending Approval';
	          	$query = $this->RestaurantStatus->getRestaurantStatusId($data);
	            $query = $this->restaurant->getRestaurantByStatus($query->row('id'));
	            echo $query->num_rows();
	          ?>
	        </h3>
	        <p>Pending Restaurants</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-android-sync"></i>
	      </div>
	      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->
	  <!-- ./col -->
	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-red">
	      <div class="inner">
	        <h3>
	          <?php
	          	$data = 'Active';
	          	$query = $this->RestaurantStatus->getRestaurantStatusId($data);
	            $query = $this->restaurant->getRestaurantByStatus($query->row('id'));
	            echo $query->num_rows();
	          ?>
	        </h3>
	        <p>Registered Restaurants</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-spoon"></i><i class="ion ion-fork"></i>
	      </div>
	      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->
	</div>