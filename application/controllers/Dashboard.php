<?php
	
	class Dashboard extends CI_Controller 
	{
	
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('admin/dashboard');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/Dashboard.php */



 ?>