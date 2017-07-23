<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$config['roles'] = array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer');

	$config['permissions'] = array(
		'Delivery Status' => array(
			'read' => array('System Administrator', 'Aggregator', 'Customer'),
			'update' => array('Aggregator')),
		'Restaurant' => array(
			'create' => array('System Administrator', 'Restaurant Owner'),
			'read' => array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer'),
			'update' => array('System Administrator', 'Aggregator', 'Restaurant Owner'),
			'delete' => array('System Administrator', 'Aggregator', 'Restaurant Owner')),
		'Order' => array(
			'create' => array('System Administrator', 'Customer'),
			'read' => array('System Administrator', 'Aggregator', 'Customer'),
			'update' => array(),
			'delete' => array('System Administrator', 'Aggregator')),
		'Food Items' => array(
			'create' => array('System Administrator', 'Restaurant Owner'),
			'read' => array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer'),
			'update' => array('System Administrator', 'Restaurant Owner'),
			'delete' => array('System Administrator', 'Restaurant Owner')),
		'Category' => array(
			'create' => array('System Administrator', 'Aggregator', 'Restaurant Owner'),
			'read' => array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer'),
			'update' => array('System Administrator', 'Aggregator', 'Restaurant Owner'),
			'delete' => array('System Administrator', 'Aggregator')),
		'Contact Number' => array(
			'create' => array('System Administrator', 'Restaurant Owner'),
			'read' => array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer'),
			'update' => array('System Administrator', 'Restaurant Owner'),
			'delete' => array('System Administrator', 'Restaurant Owner')),
		'Feedback' => array(
			'create' => array('System Administrator', 'Customer'),
			'read' => array('System Administrator', 'Aggregator', 'Restaurant Owner', 'Customer'),
			'update' => array('System Administrator', 'Customer'),
			'delete' => array('System Administrator', 'Customer')));
?>