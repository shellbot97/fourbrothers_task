<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_form extends CI_Controller 
	{
	
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('user/form');
		}
	
	}
	
	/* End of file User_form.php */
	/* Location: ./application/controllers/User_form.php */




?>