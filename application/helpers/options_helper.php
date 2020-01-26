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
    $query = $CI->db->get_where('nunu_options', array('option_key' => $options_key));
     
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
	function get_sex_list($action = 'create', $current_value = null)
	{
    $sex_list = get_options_list('options/sex');

    $control_html = '<select name="patient-sex" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($sex_list as $sex): 
      if($sex['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $sex['option_value'] . '">' . $sex['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $sex['option_value'] . '">' . $sex['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
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
  function get_id_type_list($action = 'create', $current_value = null)
  {
    $id_type_list = get_options_list('options/id-type');

    $control_html = '<select name="patient-id-type" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($id_type_list as $id_type): 
      if($id_type['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $id_type['option_value'] . '">' . $id_type['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $id_type['option_value'] . '">' . $id_type['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
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
  function get_blood_list($action = 'create', $current_value = null)
  {
    $blood_list = get_options_list('options/blood-type');

    if($action == 'edit') {
      if((!strpos($current_value, '-')) && ($current_value != 'Otro')) {
        $current_value = trim($current_value) . "+";
      }
    }

    $control_html = '<select name="patient-blood-type" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';
    }
    
    foreach($blood_list as $blood_type): 
      if($blood_type['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $blood_type['option_value'] . '">' . $blood_type['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $blood_type['option_value'] . '">' . $blood_type['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
  }
}




if ( ! function_exists('get_marital_status_list'))
{
  /**
   * get_marital_status_list
   *
   * Returns the Marital Status List from Database
   * 
   * @return  mixed
   */
  function get_marital_status_list($action = 'create', $current_value = null)
  {
    $marital_status_list = get_options_list('options/marital-status');

    $control_html = '<select name="patient-marital-status" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';
    }
    
    foreach($marital_status_list as $marital_status): 
      if($marital_status['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $marital_status['option_value'] . '">' . $marital_status['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $marital_status['option_value'] . '">' . $marital_status['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
  }
}




if ( ! function_exists('get_education_list'))
{
  /**
   * get_education_list
   *
   * Returns the Education List from Database
   * 
   * @return  mixed
   */
  function get_education_list($action = 'create', $current_value = null)
  {
    $education_list = get_options_list('options/education');

    $control_html = '<select name="patient-education" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($education_list as $education): 
      if($education['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $education['option_value'] . '">' . $education['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $education['option_value'] . '">' . $education['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
  }
}




if ( ! function_exists('get_country_list'))
{
  /**
   * get_country_list
   *
   * Returns the Country List from Database
   * 
   * @return  mixed
   */
  function get_country_list($action = 'create', $current_value = null)
  {
    $country_list = get_options_list('options/country');

    $control_html = '<select name="patient-country" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($country_list as $country): 
      if($country['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $country['option_value'] . '">' . $country['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $country['option_value'] . '">' . $country['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
  }
}




if ( ! function_exists('get_province_list'))
{
  /**
   * get_province_list
   *
   * Returns the Province List from Database
   * 
   * @return  mixed
   */
  function get_province_list($action = 'create', $current_value = null)
  {
    $province_list = get_options_list('options/province');

    $control_html = '<select name="patient-province" class="form-control">';

    //if current_value is empty that means is not for edit
    if($action == 'edit') {
      $control_html = '<select name="edit-control" class="form-control edit-control">';;
    }
 
    foreach($province_list as $province): 
      if($province['option_value'] == $current_value):
        $control_html .= '<option selected value="' . $province['option_value'] . '">' . $province['option_value'] . '</option>';
      else:
        $control_html .= '<option value="' . $province['option_value'] . '">' . $province['option_value'] . '</option>';
      endif;
    endforeach;
    $control_html .= '</select>';

    return $control_html;
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










