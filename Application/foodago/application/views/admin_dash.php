<?php
	if(isset($this->session->userdata['logged_in'])){
	  if($this->session->userdata['user_type'] == 'Aggregator' || $this->session->userdata['user_type'] == 'System Admin' || $this->session->userdata['user_type'] == 'Restaurant Owner'){
	    // CONTINUE WITH PAGE
	    if($this->session->userdata['user_type'] == 'System Admin' || $this->session->userdata['user_type'] == 'Aggregator'){
	    	$content = 'standard_admin_dash';
	    }else if($this->session->userdata['user_type'] == 'Restaurant Owner'){
	    	$content = 'res_owner_dash';
	    }
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
	  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Dashboard</li>
	</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	<!-- Small boxes (Stat box) -->
	<?php $this->load->view($content); ?>
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
	              <li><a href="">Add new event</a></li>
	              <li><a href="">Clear events</a></li>
	              <li class="divider"></li>
	              <li><a href="">View calendar</a></li>
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