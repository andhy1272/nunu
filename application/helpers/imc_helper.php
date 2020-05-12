<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------


if ( ! function_exists('show_imc_table'))
{
  /**
   * show_imc_table
   *
   * Returns the IMC table information
   * 
   * @return  mixed
   */
  function show_imc_table($table, $filters)
  {
    $imc_table = "<div class='imc-table'>";
    $imc_table .= "<table>";
    $imc_table .= "<thead>";
    $imc_table .= "<tr><th>IMC</th><th>Clasificaci&oacute;n</th></tr>";
    $imc_table .= "</thead>";
    $imc_table .= "<tbody>";
    $imc_table .= "<tr><td>&lt; 16.00</td><td>Delgadez Severa</td></tr>";
    $imc_table .= "<tr><td>16.00 - 16.99</td><td>Delgadez Moderada</td></tr>";
    $imc_table .= "<tr><td>17.00 - 18.49</td><td>Delgadez Aceptable</td></tr>";
    $imc_table .= "<tr><td>18.50 - 24.99</td><td>Peso Normal</td></tr>";
    $imc_table .= "<tr><td>25.00 - 29.99</td><td>Sobrepeso</td></tr>";
    $imc_table .= "<tr><td>30.00 - 34.99</td><td>Obesidad Tipo I</td></tr>";
    $imc_table .= "<tr><td>35.00 - 40.00</td><td>Obesidad Tipo II</td></tr>";
    $imc_table .= "<tr><td>40.00 &gt;</td><td>Obesidad Tipo III</td></tr>";
    $imc_table .= "</tbody>";
    $imc_table = "</table>";
    $imc_table = "<span>Clasificaci&oacute;n de la OMS</span>";
    $imc_table = "</div>";

    return $imc_table;
  }
}




if ( ! function_exists('get_imc_calculator') ) {
	/**
	 * get_imc_calculator
	 *
	 * Returns the Business Name from Database
	 * 
	 * @return	mixed
	 */
	function get_imc_calculator($height = null, $weight = null, $result = null)
	{
    $script = "";

    if ( ($height != nulll) && ($weight != nulll) && ($result != nulll) ) {
      $script .= '<script type="text/javascript">';
      $script .= '$(document).ready(function() { ';
                      
      $script .= ' }); ';
      $script .= '</script>';
    }

    return $script;
	}
}
























