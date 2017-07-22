<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Acl{
		public function validatePermission($controller, $required_permissions = array('delete'), $user_type_id = NULL){
			if(!is_array($required_permissions)){
				$required_permissions = explode(',', $required_permissions);
			}

			$user_type = $this->session->userdata('user_type');

			if(!$user_type){
				return FALSE;
			}

			$permissions = array();

			foreach ($this->acl[$controller] as $actions => $roles)
			{
				foreach ($user_roles as $user_role)
				{
					if (in_array( $user_role, $roles ))
					{
						$permissions[$actions] = $roles;	
					}					
				}
			}
			
			foreach ($permissions as $action => $role)
			{
				if (in_array($action, $required_permissions))
				{
					if (($action == 'edit own' OR $action == 'delete own') && ( ! isset($author_uid) OR $author_uid != $uid))
					{
						return FALSE;
					}
					return TRUE;
				}
			}
		}
	}
?>