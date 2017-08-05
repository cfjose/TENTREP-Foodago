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