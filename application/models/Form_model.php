<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Form_model extends CI_Model 
	{

		public function __construct()
		{
			parent::__construct();
			$this->data = array();
		}

		/**
		* controller Form - post_ImageData
		* @access	public
		* @return	array
		* @param array $imageData [name, email, contact_number, img]
		* tables	users
		*/
	
		public function users_post_ImageData($imageData)
		{
			$this->db->trans_start();
				$this->db->insert('users',$imageData);
				$users_insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return ($users_insert_id != 0) ? true: false;
		}
		
	
	}
	




?>