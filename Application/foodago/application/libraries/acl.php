<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$config['permissions'] = array();

	$this->db->select('*');
	$this->db->from('user_type');

	$query = $this->db->get();

	$config['roles'] = array();

	foreach($query->result() as $row){
		$config['roles'] = $row->name;
	}
?>

