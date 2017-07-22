<?php
	if(isset($this->session->userdata['logged_in'])){
		// CONTINUE WITH PAGE
	}else{
		// NO SESSION FOUND, REDIRECT TO LOGIN PAGE
		redirect(base_url() . 'index.php/login/userLogin');
	}
?>