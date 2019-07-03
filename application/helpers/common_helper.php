<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        


        /**
        * gets the userdata from in users_get_ImageData function from dashboard model
        *
        * @access   public
        * @return   json
        */
       
        function echo_result_by_array($data = '')
        {
            if (!empty($data)) {
                return json_encode(array("status" => "Success", "responce_code" => 200, "data" => $data), 200);
            }else{
                return json_encode(array("status" => "Success", "responce_code" => 204, "data" => "No Content"), 200);
            }
        } 


        /**
        * gets the userdata from in users_get_ImageData function from dashboard model
        *
        * @access   public
        * @return   json
        */
         
        function give_responce_boolean($value='')
        {
            if ($value) {
                return json_encode(array("status" => "Success", "responce_code" => 200, "data" => "Successful"), 200);
            }else{
                return json_encode(array("status" => "Failed", "responce_code" => 500, "data" => "Failed"), 200);
            }
        }


        /**
        * gets the userdata from in users_get_ImageData function from dashboard model
        *
        * @access   public
        * @return   json
        */
       
        function echo_validation_errors($value='')
        {
            return json_encode(array("status" => "Unprocessable Entity", "responce_code" => 422, "data" => array('Errors' => $value)), 200);
        }

?>