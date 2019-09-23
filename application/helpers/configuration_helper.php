<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------


if ( ! function_exists('get_configuration_value'))
{
  /**
   * get_configuration_value
   *
   * Returns the value from an specific configuration
   * 
   * @return  mixed
   */
  function get_configuration_value($table, $filters)
  {
    //get main CodeIgniter object
    $CI =& get_instance();
    //load databse library
    $CI->load->database();
     
    //get data from database
    $query = $CI->db->get_where($table, $filters);
     
    if($query->num_rows() > 0){
      return $query->result_array();
    }else{
      return false;
    }
  }
}




if ( ! function_exists('get_patients_list'))
{
	/**
	 * get_patients_list
	 *
	 * Returns the Patients List from Database
	 * 
	 * @return	mixed
	 */
	function get_patients_list()
	{
    $filters = array('config_key' => $options_key);
    $filters = array();

    return get_search_list('nunu_patients', $filters);
	}
}

























