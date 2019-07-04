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
				$this->data = $this->users_getData_by_id($users_insert_id);
			$this->db->trans_complete();
			return $this->data;
		}

		public function update_email_status($value_status='', $email)
		{
			if ($value_status) {
				$this->db->where('email', $email);
				$this->db->update('users', array('email_sent' => 1 ));
				return true; 
			}
			return false;
		}

		public function users_getData_by_id($id='')
		{
			$this->db->select('name, email, contact_number, img');
			$this->db->from('users');
			$this->db->where('id', $id);
			$this->data = $this->db->get()->row_array();
			return $this->data;
		}
		
	
	}
	




?>