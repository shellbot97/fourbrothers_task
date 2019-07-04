<?php 

	/**
	* This class Deals with the APIs of user form where user is able to add 
	* the images along with their details.
	*/
	class User_form extends CI_Controller
	{
		
		public function __construct()
		{
			print_r("var");die;
			parent::__construct();
			$this->load->model('Form_model', 'form_m');
		}


		/**
		* posts the userdata to in users_post_ImageData function from form model
		*
		* @access	public
		* @return	json
		*/
	
		public function post_ImageData()
		{
			print_r("var");die;
			$this->form_validation->set_rules('name', 'Name', 'trim|numeric|required|max_length[40]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[40]');
			$this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required|exact_length[10]');
			$this->form_validation->set_rules('img', 'Image', 'required');
			
			if ($this->form_validation->run() == FALSE){
				echo echo_validation_errors(validation_errors());
			}else{
				$imageData = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'contact_number' => $this->input->post('contact_number'),
					'img' => $this->input->post('img')
				);
				$response_users_post_ImageData = $this->form_m->users_post_ImageData($imageData);
				echo give_responce_boolean($response_users_post_ImageData);
			}
		}
	}





 ?>