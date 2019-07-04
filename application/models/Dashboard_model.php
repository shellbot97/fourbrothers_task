<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard_model extends CI_Model 
	{

		public function __construct()
		{
			parent::__construct();
			$this->data = array();
		}

		/**
		* controller Dashboard - get_ImageData
		* @access	public
		* @return	array
		* tables	users
		*/
	
		public function users_get_ImageData()
		{
			$this->db->select('name, email, contact_number, img, created_date');
			$this->db->from('users');
			$this->data = $this->db->get()->result_array();
			return $this->data;
		}
		
	
	}
	




?>