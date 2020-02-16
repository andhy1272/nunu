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




if ( ! function_exists('get_business_name') ) {
	/**
	 * get_business_name
	 *
	 * Returns the Business Name from Database
	 * 
	 * @return	mixed
	 */
	function get_business_name()
	{
    $filters = array('config_key' => $options_key);

    return get_configuration_value('nunu_patients', $filters);
	}
}










if ( ! function_exists('get_agenda_frequency_list'))
{
  /**
   * get_agenda_frequency_list
   *
   * Returns the Hours List requested from Database
   * 
   * @return  mixed
   */
  function get_agenda_frequency_list()
  {
    $result = get_configuration_value('nunu_config', array('config_key' => ''));

    $control_html = '<select name="store" class="form-control store-list">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($store_list as $store): 
      if($store['store_name'] == $current_value):
        $control_html .= '<option selected value="' . $store['store_id'] . '">' . $store['store_name'] . '</option>';
      else:
        $control_html .= '<option value="' . $store['store_id'] . '">'; 
        $control_html .= $store['store_name'];
        $control_html .= '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
  }
}

















