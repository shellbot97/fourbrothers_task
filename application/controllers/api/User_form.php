<?php 

	/**
	* This class Deals with the APIs of user form where user is able to add 
	* the images along with their details.
	*/
	class User_form extends CI_Controller
	{
		
		public function __construct()
		{
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
			$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[40]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[40]');
			$this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required|exact_length[10]');
			
			if ($this->form_validation->run() == FALSE)
			{
				echo echo_validation_errors(validation_errors());
			}
			else{


//watermarking and then uploading the image to folder
				$response_upload_image = $this->watermarkImage();

				$imageData = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'contact_number' => $this->input->post('contact_number'),
					'img' => json_encode(array('path' => $response_upload_image ))
				);
				$response_users_post_ImageData = $this->form_m->users_post_ImageData($imageData);
				$response_send_mail_with_cc = $this->send_mail_with_cc($response_users_post_ImageData);

				$this->form_m->update_email_status($response_send_mail_with_cc, $response_users_post_ImageData['email']);

				echo give_responce_boolean($response_send_mail_with_cc);
			}
		}


		/**
		* initializes and set configuration for the email library
		*
		* @access	private
		* @return	bool
		*/

		private function send_mail_with_cc($data)
		{
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'dev.hitesh97@gmail.com',
			    'smtp_pass' => 'SHUbhangi@663',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->email->initialize($config);
			$this->email->from('dev.hitesh97@gmail.com', 'Hitesh Ingale');
			$this->email->to($data['email']);
			$this->email->cc('prajwalingale63@gmail.com');

			$this->email->subject('Edited Image');
			$this->email->message('PFA the watermarked Image');
			$this->email->attach(json_decode($data['img'])->path, "inline");
			$this->email->set_newline("\r\n");
			return $this->email->send();
//for logging
			//print_r($this->email->print_debugger());die;
		}


		/**
		*  check the directory if not created then create
		* validates the image size, type 
		* check if image with same name already exists
		* add watermarks to image
		* @access	private
		* @return	mime
		*/
	
		function watermarkImage() 
		{
			if(getimagesize($_FILES["img"]["tmp_name"]) === false || $_FILES["img"]["size"] > 500000)
				exit(give_responce_boolean(false));


			$SourceFile = rand(0, 9999).'.'.explode(".", $_FILES['img']['name'])[1];
			copy( $_FILES['img']['tmp_name'], $SourceFile);
			$WaterMark = '/var/www/html/task/images/asset_images/images.jpeg';
			$opacity = 50;
			$DestinationFile = '/var/www/html/task/images/user_images/'.explode(".", $_FILES['img']['name'])[0].'-edited.jpg';

			$main_img = $SourceFile; 
			$watermark_img = $WaterMark; 
			$padding = 3; 
			$opacity = $opacity; 

			$watermark = imagecreatefromjpeg($watermark_img); // create watermark
			$image = imagecreatefromjpeg($main_img); // create main graphic

			if(!$image || !$watermark) die("Error: main image or watermark could not be loaded!");

			$watermark_size = getimagesize($watermark_img);
			$watermark_width = $watermark_size[0]; 
			$watermark_height = $watermark_size[1]; 

			$image_size = getimagesize($main_img); 
			$dest_x = $image_size[0] - $watermark_width - $padding; 
			$dest_y = $image_size[1] - $watermark_height - $padding;

			// copy watermark on main image
			imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);
			if ($DestinationFile<>'') {
				imagejpeg($image, $DestinationFile, 100); 
			} 
			else {
				header('Content-Type: image/jpeg');
				imagejpeg($image);
			}
			imagedestroy($image); 
			imagedestroy($watermark); 
			return $DestinationFile;
		}
	}







 ?>