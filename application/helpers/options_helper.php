<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

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
		//get main CodeIgniter object
       $CI =& get_instance();
       
       //load databse library
       $CI->load->database();
       
       //get data from database
       //$query = $CI->db->get_where('users',array('id'=>$id));
       $query = $CI->db->get('nunu_options_sex');
       
       if($query->num_rows() > 0){
           //$result = $query->row_array(); solo retorna el primer row
           return $query->result_array();
       }else{
           return false;
       }
	}
}




