<?php 

	/**
	* This class Deals with the APIs of admin portal where Admin is able to see 
	* the images uploaded by users along with their details.
	*/
	class Dashboard extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Dashboard_model', 'dashboard_m');
		}


		/**
		* gets the userdata from in users_get_ImageData function from dashboard model
		*
		* @access	public
		* @return	json
		*/
	
		public function get_ImageData()
		{
			$response_users_get_ImageData = $this->dashboard_m->users_get_ImageData();
			echo give_responce_array($response_users_get_ImageData);
		}
	}





 ?>