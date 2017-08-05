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
    <?php
      $mn = str_replace('_', ' ', $_GET['mn']);
      $mn_uc = ucwords($mn);

      echo $mn_uc;

      // $tn = $this->encryption->decrypt($_GET['tn']);
    ?>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php
                if(in_array('Create ' . $mn_uc, $this->session->userdata['user_privileges'])){
                  echo "<a href='".base_url()."index.php/admin?page_view=add_".$_GET['tn']."&ct=add&dbt=".$_GET['tn']."&ref_mod=".$_GET['mn']."' class='btn btn-primary'>Add " . $mn_uc . "</a>";
                }
              ?>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <?php

                  $this->db->select('*');
                  $this->db->from($_GET['tn']);


                  $get_table_fields = $this->db->list_fields($_GET['tn']);

                  echo "<tr>";
                  echo "<th width='10%'>Permissions</th>";
                  foreach($get_table_fields as $field){
                    if(strpos($field, '_id')){
                      $this->db->order_by($field, 'ASC');
                      $field = str_replace('_id', '', $field);
                    }else{
                      $field = str_replace('_', ' ', $field);
                      $this->db->order_by('id', 'ASC');
                    }

                    $field = ucwords($field);
                    echo "<th>" . $field . "</th>";
                  }

                  $query = $this->db->get();

                  echo "</tr>";

                  foreach($query->result() as $row){
                      echo "<tr>";
                      echo "<td>";
                        if(in_array('Update ' . $mn_uc, $this->session->userdata['user_privileges'])){
                          echo "<a href='".base_url()."index.php/admin?page_view=admin_form&ct=edit&dbt=".$_GET['tn']."&ref_mod=".$_GET['mn']."' class='btn btn-warning'><i class='fa fa-pencil'></i></a> ";
                        }

                        if(in_array('Delete ' . $mn_uc, $this->session->userdata['user_privileges'])){
                          echo "<a href='' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
                        }
                      echo "</td>";

                        foreach($get_table_fields as $field){
                          if(stristr($field, '_id')){
                            $get_table_name = str_replace('_id', '', $field);

                            $this->db->select('*');
                            $this->db->from($get_table_name);
                            $this->db->where("id ='".$row->$field."'");

                            $query = $this->db->get();

                            echo "<td>" . $query->row('name') . "</td>";
                          }else{
                            echo "<td>" . $row->$field . "</td>";
                          }
                        }
                      echo "<tr>";
                    }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
  </section>
  <!-- /.row (main row) -->