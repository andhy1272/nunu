<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------


if ( ! function_exists('get_options_list'))
{
  /**
   * get_options_list
   *
   * Returns the Options List requested from Database
   * 
   * @return  mixed
   */
  function get_options_list($options_key)
  {
    //get main CodeIgniter object
    $CI =& get_instance();
     
    //load databse library
    $CI->load->database();
     
    //get data from database
    $query = $CI->db->get_where('nunu_config', array('config_key' => $options_key));
     
    if($query->num_rows() > 0){
      return $query->result_array();
    }else{
      return false;
    }
  }
}




if ( ! function_exists('get_sex_list'))
{
	/**
	 * get_sex_list
	 *
	 * Returns the Sex List from Database
	 * 
	 * @return	mixed
	 */
	function get_sex_list()
	{
    return get_options_list('options/sex');
	}
}




if ( ! function_exists('get_id_list'))
{
  /**
   * get_id_list
   *
   * Returns the IDs List from Database
   * 
   * @return  mixed
   */
  function get_id_list()
  {
    return get_options_list('options/id-type');
  }
}




if ( ! function_exists('get_blood_list'))
{
  /**
   * get_blood_list
   *
   * Returns the Blood Type List from Database
   * 
   * @return  mixed
   */
  function get_blood_list()
  {
    return get_options_list('options/blood-type');
  }
}




if ( ! function_exists('get_service_list'))
{
  /**
   * get_service_list
   *
   * Returns the Service List from Database for Appointments creation
   * 
   * @return  mixed
   */
  function get_service_list()
  {
    return get_options_list('options/service');
  }
}




if ( ! function_exists('get_appointment_state_list'))
{
  /**
   * get_appointment_state_list
   *
   * Returns the Appointment State from Database for Appointments creation
   * 
   * @return  mixed
   */
  function get_appointment_state_list()
  {
    return get_options_list('options/appointment-state');
  }
}










