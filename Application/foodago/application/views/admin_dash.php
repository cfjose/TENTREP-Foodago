<?php
	if(isset($this->session->userdata['logged_in'])){
	  if($this->session->userdata['user_type'] == 'Aggregator' || $this->session->userdata['user_type'] == 'System Admin'){
	    // CONTINUE WITH PAGE
	  }else{
	    $this->session->userdata['current_url'] = $_SERVER['REQUEST_URI'];  
	    redirect(base_url() . 'index.php/PotentialAttempt');
	  }
	}else{
	  // NO ACTIVE SESSION DETECTED, REDIRECT TO LOGIN
	  redirect(base_url() . 'index.php/login/userLogin');
	}
?>
	<h1>
	  Dashboard
	  <small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()."assets/"; ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Dashboard</li>
	</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	<!-- Small boxes (Stat box) -->
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
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
	  <!-- Left col
	  <section class="col-lg-7 connectedSortable">
	    <!-- Custom tabs (Charts with tabs)

	  </section>-->
	  <!-- /.Left col -->
	  <!-- right col (We are only adding the ID to make the widgets sortable)-->
	  <section class="col-lg-12">

	    <!-- Calendar -->
	    <div class="box box-solid bg-white-gradient">
	      <div class="box-header">
	        <i class="fa fa-calendar"></i>

	        <h3 class="box-title">Calendar</h3>
	        <!-- tools box -->
	        <div class="pull-right box-tools">
	          <!-- button with a dropdown -->
	          <div class="btn-group">
	            <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-bars"></i></button>
	            <ul class="dropdown-menu pull-right" role="menu">
	              <li><a href="<?php echo base_url()."assets/"; ?>#">Add new event</a></li>
	              <li><a href="<?php echo base_url()."assets/"; ?>#">Clear events</a></li>
	              <li class="divider"></li>
	              <li><a href="<?php echo base_url()."assets/"; ?>#">View calendar</a></li>
	            </ul>
	          </div>
	          <button type="button" class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
	          </button>
	          <button type="button" class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-times"></i>
	          </button>
	        </div>
	        <!-- /. tools -->
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body no-padding">
	        <!--The calendar -->
	        <div id="calendar" style="width: 100%"></div>
	      </div>
	    </div>
	    <!-- /.box -->

	  </section>
	  <!-- right col -->
	</div>
	<!-- /.row (main row) -->